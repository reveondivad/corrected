// Get username from parameters
String username = request.getParameter(""username"");

// Create a prepared statement from database connection
PreparedStatement preparedStatement = connection.prepareStatement(""SELECT secret FROM Users WHERE (username = ? AND NOT role = 'admin')"");

// Set safe parameter
preparedStatement.setString(1, username);

// Execute query and return the results
ResultSet result = preparedStatement.executeQuery();