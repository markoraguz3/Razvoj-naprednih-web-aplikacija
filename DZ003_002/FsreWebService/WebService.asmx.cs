using MySqlConnector;
using System.Data;
using System.Web.Services;

namespace FsreWebService
{

    [WebService(Namespace = "http://tempuri.org/")]
    [WebServiceBinding(ConformsTo = WsiProfiles.BasicProfile1_1)]
    [System.ComponentModel.ToolboxItem(false)]
   
    public class WebServis1 : System.Web.Services.WebService
    {

        public static DataTable SendQuerry(string querry)
        {
            string connString = "SERVER=localhost" + ";" +
                "DATABASE=world;" +
                "UID=root;" +
                "PASSWORD=;";

            MySqlConnection cnMySQL = new MySqlConnection(connString);

            MySqlCommand cmdMySQL = cnMySQL.CreateCommand();

            MySqlDataReader reader;

            cmdMySQL.CommandText = querry;

            cnMySQL.Open();

            reader = cmdMySQL.ExecuteReader();

            DataTable dt = new DataTable();
            dt.Load(reader);


            cnMySQL.Close();

            return dt;

        }

        [System.Web.Services.WebMethod]
        public float BAMToEur(float bam)
        { 
            return (float)(bam * 1.96);
        }
        
        [System.Web.Services.WebMethod]
        public float EURToBAM(float eur)
        { 
            return (float)(eur * 0.51);
        }
   
        [System.Web.Services.WebMethod]
        public DataTable getCityWherePopulationIsGreaterThen(string populationNumber)
        {
            string querry = "select * from city where population >= " + populationNumber;
            return SendQuerry(querry);
        }

        [System.Web.Services.WebMethod]
        public DataTable getCountryByRegion(string region)
        {
            string querry = "select * from country where region=" + region;
            return SendQuerry(querry);
        }


    }
}
