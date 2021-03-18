using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data;
using System.Data.SqlClient;

namespace Kişisel_Kütüphane
{
    public partial class kitapozet : Form
    {


        SqlConnection baglanti = new SqlConnection(@"data source=PHOENIX2071; initial catalog=kutuphane; integrated security=true;");

        public int kullanicisirano { get; set; }
        public int secilenid=1;


        public kitapozet()
        {
            InitializeComponent();
            DataRow dr = gridView1.GetDataRow(gridView1.FocusedRowHandle);

            if (dr != null)
            {
                secilenid = Convert.ToInt32(dr[0]);
               
                richTextBox1.Text = dr[2].ToString();
                flatTextBox4.Text = dr[1].ToString();

            }


        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void simpleButton1_Click(object sender, EventArgs e)
        {
            this.WindowState = FormWindowState.Minimized;
        }

        private void gridView1_FocusedRowChanged(object sender, DevExpress.XtraGrid.Views.Base.FocusedRowChangedEventArgs e)
        {



            DataRow dr = gridView1.GetDataRow(gridView1.FocusedRowHandle);

            if (dr != null)
            {
                secilenid = Convert.ToInt32(dr[0]);
                             
                richTextBox1.Text = dr[2].ToString();
                flatTextBox4.Text = dr[1].ToString();
                
            }



        }

        private void kitapozet_Load(object sender, EventArgs e)
        {


            try
            {
                anasayfa anasayfam = new anasayfa();
                baglanti.Open();
                SqlCommand doldur = new SqlCommand("select kitapid, kitapadi, kitapozet from kitaplar where kullaniciid='" + kullanicisirano + "'", baglanti);

                SqlDataAdapter da = new SqlDataAdapter(doldur);

                DataTable dt = new DataTable();

                da.Fill(dt);

                gridControl1.DataSource = dt;

                baglanti.Close();

            }
            catch
            {

                MessageBox.Show("Bir Hata Meydana Geldi..", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Error);

            }


        }

        private void flatButton2_Click(object sender, EventArgs e)
        {



            try
            {

                baglanti.Open();
                SqlCommand guncelle = new SqlCommand("UPDATE kitaplar SET kitapozet='" + richTextBox1.Text + "' WHERE kitapid='" + secilenid + "'", baglanti);

                guncelle.ExecuteNonQuery();


                MessageBox.Show("Kayıt Başarıyla Güncellendi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);



                try
                {
                    anasayfa anasayfam = new anasayfa();
                    SqlCommand doldur = new SqlCommand("select kitapid, kitapadi, kitapozet from kitaplar where kullaniciid='" + kullanicisirano + "'", baglanti);

                    SqlDataAdapter da = new SqlDataAdapter(doldur);

                    DataTable dt = new DataTable();

                    da.Fill(dt);

                    gridControl1.DataSource = dt;



                }
                catch
                {

                    MessageBox.Show("Bir Hata Meydana Geldi..", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Error);

                }

                baglanti.Close();

            }
            catch
            {

                MessageBox.Show("Bir Hata Meydana Geldi..", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Error);

            }




        }

        private void button2_Click(object sender, EventArgs e)
        {



            



        }

        private void flatButton1_Click(object sender, EventArgs e)
        {




            





        }
    }
}
