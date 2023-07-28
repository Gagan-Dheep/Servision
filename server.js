const express = require('express');
const path = require('path');

const app = express();
const port = 3000;

// Set "public" folder as the static folder
app.use(express.static(path.join(__dirname, 'public')));

// Start the server
app.listen(port, () => {
  console.log(`Server is running at http://localhost:${port}`);
});

