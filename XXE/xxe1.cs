using System;
using System.IO;
using System.IO.Compression;

namespace myApp
{
    class Program
    {
        static void Main(string[] args)
        {
            Console.WriteLine(""Enter Path of Zip File to extract:"");
            string zipPath = Console.ReadLine();
            Console.WriteLine(""Enter Path of Destination Folder"");
            string extractPath = Console.ReadLine();

            if (File.Exists(zipPath) && Directory.Exists(extractPath))
            {
                using (ZipArchive archive = ZipFile.OpenRead(zipPath))
                {
                    foreach (ZipArchiveEntry entry in archive.Entries)
                    {
                        string destinationPath = Path.GetFullPath(Path.Combine(extractPath, entry.FullName));
                        if (destinationPath.StartsWith(extractPath, StringComparison.Ordinal))
                            entry.ExtractToFile(destinationPath);
                    }
                }
                Console.WriteLine(""Files extracted successfully to: "" + extractPath);
            }
            else
            {
                Console.WriteLine(""Invalid file or directory path."");
            }
        }
    }
}"