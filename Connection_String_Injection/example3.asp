string userID = userModel.username;
string passwd = userModel.password;

// connect DB with the authenticated user provided credentials
// valid connection also implies successful authentication
SqlConnection DBconn = new SqlConnection();

DBconn.ConnectionString = ""Data Source= tcp:10.10.2.1,1434;Initial Catalog=mydb;"";
DBconn.Credential = new SqlCredential(userID, passwd);