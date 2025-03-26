# Songfess Kelazzz F

## Overview
The Songfess website allows users to send song requests along with personalized messages to their friends. Users can submit new songfess entries, browse existing entries based on the recipient's name, and enjoy a visually appealing interface with embedded Spotify links for song selection.

## Project Structure
```
songfess-website
├── src
│   ├── index.php          # Main entry point displaying songfess entries
│   ├── form.php           # Form for submitting new songfess entries
│   ├── browse.php         # Search functionality for songfess entries
│   ├── css
│   │   └── style.css      # Styles for the website
│   ├── js
│   │   └── script.js      # JavaScript functionality
│   └── includes
│       └── db.php        # Database connection handling
├── assets
│   └── logo.png           # Logo image for the website
├── README.md               # Project documentation
└── .gitignore              # Files to ignore in version control
```

## Features
- **Submit Songfess**: Users can submit song requests with messages through a dedicated form.
- **Browse Songfess**: Users can search for songfess entries based on the recipient's name.
- **Embedded Spotify Links**: Songfess entries include embedded Spotify links for easy listening.
- **Responsive Design**: The website is designed to be user-friendly and visually appealing.

## Setup Instructions
1. Clone the repository to your local machine.
2. Navigate to the project directory.
3. Set up a database and configure the `db.php` file with your database credentials.
4. Open `index.php` in your web browser to view the main page.
5. Use the form to submit new songfess entries or browse existing ones.

## Technologies Used
- PHP for server-side scripting
- MySQL for database management
- HTML/CSS for front-end design
- JavaScript for dynamic functionality

## License
This project is licensed under the MIT License - see the LICENSE file for details.
