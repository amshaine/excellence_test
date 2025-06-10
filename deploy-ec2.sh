#!/bin/bash

# Update system
sudo yum update -y

# Install Docker
sudo yum install -y docker
sudo service docker start
sudo usermod -a -G docker ec2-user

# Install Docker Compose
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Create production environment file
cat > .env << EOL
# API Configuration
API_URL=http://0.0.0.0:8000

# Database Configuration
DB_HOST=${RDS_HOST}
DB_PORT=3306
DB_DATABASE=${RDS_DATABASE}
DB_USERNAME=${RDS_USERNAME}
DB_PASSWORD=${RDS_PASSWORD}
EOL

# Build and start containers
docker-compose up -d --build

# Print Cloudflare setup instructions
echo "
Cloudflare Setup Instructions:
1. Add your domain to Cloudflare
2. Create DNS records:
   - Type A: api.yourdomain.com -> Your EC2 IP
   - Type A: yourdomain.com -> Your EC2 IP
3. Enable Cloudflare proxy (orange cloud)
4. Set up SSL/TLS:
   - Go to SSL/TLS section
   - Set encryption mode to 'Full'
5. Create Page Rules:
   - URL: api.yourdomain.com/*
   - Forward to: http://your-ec2-ip:8000/$1
   - URL: yourdomain.com/*
   - Forward to: http://your-ec2-ip:3000/$1
" 