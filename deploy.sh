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

# Create .env file for RDS configuration
cat > .env << EOL
RDS_HOST=your-rds-endpoint.region.rds.amazonaws.com
RDS_PORT=3306
RDS_DATABASE=your_database
RDS_USERNAME=your_username
RDS_PASSWORD=your_password
EOL

# Build and start containers
docker-compose up -d --build 