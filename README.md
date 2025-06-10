# Next.js + Laravel Project

## Local Development Setup

1. Clone the repository:
```bash
git clone <your-repo-url>
cd <your-repo>
```

2. Set up environment files:
```bash
# For local development
cp .env.local .env
```

3. Start the services:
```bash
docker-compose up -d
```

4. Access the applications:
- Frontend: http://localhost:3000
- Backend API: http://localhost:8000

## AWS Deployment

1. Create an EC2 instance:
- Use Amazon Linux 2
- Open ports 3000 and 8000 in security group
- Attach an IAM role with RDS access

2. Create an RDS instance:
- Use MySQL 8.0
- Note down the endpoint, database name, username, and password
- Make sure it's in the same VPC as your EC2 instance

3. On your EC2 instance:
```bash
# Install Docker and Docker Compose
sudo yum update -y
sudo yum install -y docker
sudo service docker start
sudo usermod -a -G docker ec2-user
sudo curl -L "https://github.com/docker/compose/releases/latest/download/docker-compose-$(uname -s)-$(uname -m)" -o /usr/local/bin/docker-compose
sudo chmod +x /usr/local/bin/docker-compose

# Clone the repository
git clone <your-repo-url>
cd <your-repo>

# Set up production environment
cp .env.production .env
# Edit .env with your RDS details

# Start the services
docker-compose up -d
```

4. Access the applications:
- Frontend: http://your-ec2-ip:3000
- Backend API: http://your-ec2-ip:8000

## Environment Variables

### Local Development (.env.local)
```
API_URL=http://0.0.0.0:8000
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=laravel
DB_PASSWORD=secret
DB_ROOT_PASSWORD=root
```

### Production (.env.production)
```
API_URL=http://your-ec2-ip:8000
DB_HOST=your-rds-endpoint.region.rds.amazonaws.com
DB_PORT=3306
DB_DATABASE=your_database
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

## Development Workflow

### Frontend (Next.js)
- Located in the `frontend` directory
- Hot reloading enabled
- API calls should be made to `http://localhost:8000/api`

### Backend (Laravel)
- Located in the `backend` directory
- API endpoints are prefixed with `/api`
- Database migrations and seeders available

### Database
- Local development uses MySQL in Docker
- Production will use AWS RDS

## Production Deployment

The project is configured for deployment to AWS:
- Frontend: AWS ECS/Fargate
- Backend: AWS ECS/Fargate
- Database: AWS RDS

## Contributing

1. Create a new branch for your feature
2. Make your changes
3. Submit a pull request

## License

MIT 