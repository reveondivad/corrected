try {
    Class.forName(""com.mysql.cj.jdbc.Driver"").newInstance();
    String selectedDB = request.getParameter(""selectedDB"");
    if (selectedDB == null || selectedDB.isEmpty()) {
        throw new IllegalArgumentException(""Database selection cannot be null or empty"");
    }
    String url = ""jdbc:mysql://10.12.1.34/"" + selectedDB;
    conn = DriverManager.getConnection(url, username, password);
    doUnitWork();
} catch(ClassNotFoundException | SQLException | InstantiationException e) {
    // Handle exception
} finally {
    if (conn != null) {
        try {
            conn.close();
        } catch (SQLException e) {
            // Handle exception
        }
    }
}