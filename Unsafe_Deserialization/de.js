class LogFile implements Serializable
{
   private static final long serialVersionUID = 1L;
   public String filename;
   public String filecontent;

   private void readObject(ObjectInputStream in) throws IOException, ClassNotFoundException
   {
      System.out.println(""readObject from LogFile"");

      // Unserialize data
      in.defaultReadObject();
      System.out.println(""File name: "" + filename + "", file content: \n"" + filecontent);

      // Do something useful with the data
      // Restore LogFile, write file content to file name

      try (FileWriter file = new FileWriter(filename, StandardCharsets.UTF_8);
           BufferedWriter out = new BufferedWriter(file)) {

          System.out.println(""Restoring log data to file..."");
          out.write(filecontent);
      } catch (IOException e) {
          System.out.println(""Exception: "" + e.toString());
      }
   }
}