<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | IIT Patna Placement Website</title>
    <!-- <link rel="stylesheet" href="style.css"> -->
  </head>
  <style>
    /* General Styles */

/* General Styles */

/* General Styles */

* {
  box-sizing: border-box;
}

body {
			display: flex;
			flex-direction: column;
			align-items: center;
			justify-content: center;
			height: 100vh;
			background-image: url('https://picsum.photos/1600/1200');
			background-size: cover;
			background-position: center;
		}
        
	main {
		/* background-color: rgba(255, 255, 255, 0.8); */
		padding: 20px;
		border-radius: 10px;
		text-align: center;
	}

header {
  background-color: #333;
  color: white;
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
}

nav {
  display: flex;
  align-items: center;
}

nav a {
  color: white;
  margin-left: 1rem;
  text-decoration: none;
  font-size: 1.1rem;
  transition: all 0.2s ease-in-out;
}

nav a:hover {
  text-decoration: underline;
  transform: scale(1.1);
}

main {
  margin: 2rem;
}

h1, h2, h3 {
  color: #333;
  font-family: Helvetica, sans-serif;
  margin-bottom: 1rem;
}

p, ul, ol {
  font-size: 1.1rem;
  line-height: 1.5;
}

ul, ol {
  margin-left: 2rem;
}

li {
  margin-bottom: 0.5rem;
}

a {
  color: #333;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}

/* About Us Styles */

.about-container {
  background-color: rgba(255, 255, 255, 0.8);
  backdrop-filter: blur(10px);
  border-radius: 10px;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  margin: 2rem;
  padding: 2rem;
}

.about-card {
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  margin: 1rem;
  overflow: hidden;
  width: 300px;
}

.about-card img {
  width: 100%;
  height: 200px;
  object-fit: cover;
}

.about-card h2 {
  font-size: 1.2rem;
  font-weight: 500;
  margin: 1rem;
}

.about-card p {
  margin: 1rem;
}

/* Contact Us Styles */

.contact-container {
  background-color: rgba(0, 0, 0, 0.8);
  color: white;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  padding: 2rem;
}

.contact-card {
  background-color: white;
  border-radius: 10px;
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
  color: #333;
  margin: 1rem;
  overflow: hidden;
  width: 300px;
}

.contact-card i {
  color: #333;
  font-size: 2rem;
  margin: 1rem;
}

.contact-card h2 {
  font-size: 1.2rem;
  font-weight: 500;
  margin: 1rem;
}

.contact-card p {
  margin: 1rem;
}


    </style>
  <body>
    <header>
      <nav>
        <a href="index.html">Home</a>
        <a href="#">About Us</a>
        <a href="#">Contact Us</a>
      </nav>
    </header>
    <main>
      <h1>About Us</h1>
      <p>We are a team of three students from Indian Institute of Technology Patna:</p>
      <ul>
        <li>Sahil Agrawal (2101CS69)</li>
        <li>Aryan Sahoo (2101AI06)</li>
        <li>Anuj Sharma (2101CS11)</li>
      </ul>
      <p>As part of our course CS260 (database lab) Mini Project, we have created a training and placement website exclusively for IIT-Patna students. Our aim is to simplify the placement process for students and provide them with a platform to connect with potential employers. </p>
      <p>We worked closely with the IIT-Patna placement cell to understand the needs of students and create a user-friendly interface that caters to their specific requirements. Through this project, we hope to contribute to the success of our fellow students and the wider IIT-Patna community.</p>
      <h2>Contact Us</h2>
      <p>If you have any questions or feedback, please do not hesitate to contact us:</p>
      <ul>
        <li>Email: placement@iitp.ac.in</li>
        <li>Phone: +91 1234567890</li>
        <li>Address: Indian Institute of Technology Patna, Bihta, Patna, Bihar - 801103</li>
      </ul>
    </main>
    <footer>
      <p>Copyright © 2023 - IIT Patna Placement Website</p>
    </footer>
  </body>
</html>
