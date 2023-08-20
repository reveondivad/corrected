int main(int argc, char *argv[])
{
    if(argc > 1){
        rc = SQLConnect(Example.ConHandle, argv[1], SQL_NTS,
        (SQLCHAR *) """", SQL_NTS, (SQLCHAR *) """", SQL_NTS);
    }
}