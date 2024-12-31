## YouTube-Like Application

Welcome to our YouTube-like application! This project combines the power of Laravel and React to deliver a feature-packed video platform. Whether you’re a developer seeking to learn or a user exploring the features, this app is designed to impress.

Why You'll Love This Project

Modern Tech Stack: Harnesses the robust backend of Laravel and the dynamic frontend of React.

Core Features: Upload, stream, and interact with videos seamlessly.

Scalable Design: Built with flexibility in mind, making it a perfect starting point for your custom projects.

## Features

# 🎥 User Features

Authentication: Easy signup, login, and logout.

Profile Management: Customize your user profile.

Video Upload & Management: Share your content effortlessly.

Streaming: Enjoy smooth video playback.

Engagement Tools: Comment and like/dislike videos to interact with the community.

# 🔧 Admin Features

User Management: Oversee platform users.

Moderation Tools: Keep content and comments in check.

Analytics Dashboard: Gain insights into platform activity.

Tech Stack

##Backend

Laravel: API endpoints, user authentication, and data storage.

MySQL: Reliable database for storing data.

FFmpeg: Optional, for video processing tasks.

## Frontend

React: Dynamic and responsive UI.

Axios: Smooth communication with the backend.

Tailwind CSS: Modern and customizable styling.

## Getting Started

Prerequisites

Before you begin, ensure you have the following installed:

PHP >= 8.0

Composer

Node.js >= 14

MySQL

# Backend Setup

Clone the repository:
``` bash
git clone https://github.com/your-username/your-repo-name.git
cd your-repo-name/backend
``` 
Install dependencies:
```
composer install
``` 

Configure the .env file:
- Set your database credentials.
- Add any other required environment variables.

Run migrations and seed the database:
``` 
php artisan migrate --seed
```

Start the Laravel server:
```
php artisan serve
``` 

# Frontend Setup:
Navigate to the frontend directory:
```
cd react/
``` 
Install dependencies:
``` 
npm install
``` 
Start the React development server:
``` 
npm start
``` 

## How to Use

Access the application in your browser:

Backend API: http://localhost:8000

Frontend: http://localhost:3000

Register a new account or log in.

Explore features like uploading and watching videos, leaving comments, and more!

## API Highlights

# Authentication

POST /api/register: Register a new user.

POST /api/login: Log in a user.

POST /api/logout: Log out the current user.

# Videos

GET /api/videos: Retrieve a list of videos.

POST /api/videos: Upload a new video.

GET /api/videos/{id}: Fetch details of a specific video.

# Comments

POST /api/videos/{id}/comments: Add a comment.

GET /api/videos/{id}/comments: Get all comments for a video.

# Likes/Dislikes

POST /api/videos/{id}/like: Like a video.

POST /api/videos/{id}/dislike: Dislike a video.

## Contributing

We love contributions! Here's how you can help:

Fork the repository.

Create a new branch for your feature or bugfix.

Commit your changes.

Push the branch to your fork.

Open a pull request.

## License

This project is licensed under the MIT License. Feel free to use it as you wish.

## Acknowledgments

Laravel Documentation

React Documentation

## Contact

Questions or feedback? Reach out at:

Email: mohsenhammoud6@gmail.com

GitHub: github/BL3T1

Let's build something amazing together!

