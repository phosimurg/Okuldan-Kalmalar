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
    public partial class kitapayar : Form
    {

        SqlConnection baglanti = new SqlConnection(@"data source=PHOENIX2071; initial catalog=kutuphane; integrated security=true;");

        public int kullanicisirano { get; set; }
        public int secilenid=1;

        public kitapayar()
        {
            InitializeComponent();
            
            DataRow dr = gridView1.GetDataRow(gridView1.FocusedRowHandle);

        }

        private void flatButton1_Click(object sender, EventArgs e)
        {
            

        }

        private void kitapayar_Load(object sender, EventArgs e)
        {

            try
            {
                anasayfa anasayfam = new anasayfa();
                baglanti.Open();
                SqlCommand doldur = new SqlCommand("select kitapid, kitapadi, kitapaciklama,kitapyazar,kitapyayinevi,kitapsayfasayisi from kitaplar where kullaniciid='"+kullanicisirano+"'", baglanti);

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

        private void gridView1_FocusedRowChanged(object sender, DevExpress.XtraGrid.Views.Base.FocusedRowChangedEventArgs e)
        {

            DataRow dr = gridView1.GetDataRow(gridView1.FocusedRowHandle);

            if (dr !=null )
            {
                secilenid=Convert.ToInt32(dr[0]);
                flatTextBox1.Text=dr[1].ToString();
                flatTextBox2.Text = dr[2].ToString();
                flatTextBox3.Text = dr[3].ToString();
                flatTextBox4.Text = dr[4].ToString();
                flatTextBox5.Text = dr[5].ToString();
            }




        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void flatButton1_Click_1(object sender, EventArgs e)
        {

            

            try
            {
             
                baglanti.Open();
                SqlCommand guncelle = new SqlCommand("UPDATE kitaplar SET kitapadi='" + flatTextBox1.Text + "' , kitapaciklama='" + flatTextBox2.Text + "' , kitapyazar='" + flatTextBox3.Text + "' , kitapyayinevi='" + flatTextBox4.Text + "' , kitapsayfasayisi='" + flatTextBox5.Text + "' WHERE kitapid='"+secilenid+"'", baglanti);

                guncelle.ExecuteNonQuery();
                

                MessageBox.Show("Kayıt Başarıyla Güncellendi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);



                try
                {
                    anasayfa anasayfam = new anasayfa();
                    SqlCommand doldur = new SqlCommand("select kitapid, kitapadi, kitapaciklama,kitapyazar,kitapyayinevi,kitapsayfasayisi from kitaplar where kullaniciid='" + kullanicisirano + "'", baglanti);

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

        private void flatButton2_Click(object sender, EventArgs e)
        {
            

            try
            {

              
                baglanti.Open();
                
                SqlCommand ekle = new SqlCommand("insert into kitaplar(kitapadi,kitapaciklama,kitapyazar,kitapyayinevi,kitapsayfasayisi,kullaniciid) values('" + flatTextBox6.Text + "','" + flatTextBox7.Text + "','" + flatTextBox8.Text + "','" + flatTextBox9.Text + "','" + flatTextBox10.Text + "','"+kullanicisirano+"')", baglanti);

                ekle.ExecuteNonQuery();
                


               

                MessageBox.Show("Kayıt Başarıyla Eklendi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);


                flatTextBox1.Text = "";
                flatTextBox2.Text = "";
                flatTextBox3.Text = "";
                flatTextBox4.Text = "";
                flatTextBox5.Text = "";

                try
                {
                    anasayfa anasayfam = new anasayfa();
                    SqlCommand doldur = new SqlCommand("select kitapid, kitapadi, kitapaciklama,kitapyazar,kitapyayinevi,kitapsayfasayisi from kitaplar where kullaniciid='" + kullanicisirano + "'", baglanti);

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

        private void flatButton3_Click(object sender, EventArgs e)
        {

        }

        private void button2_Click(object sender, EventArgs e)
        {


            

            DialogResult dialog = new DialogResult();
            dialog = MessageBox.Show("Kaydı Gerçekten Silmek İstiyor musunuz?", "Dikkat", MessageBoxButtons.YesNo, MessageBoxIcon.Warning);
           
            if (dialog == DialogResult.Yes)
            {

                try
                {


                    baglanti.Open();

                    SqlCommand sil = new SqlCommand(" DELETE FROM kitaplar WHERE kitapid='" + secilenid + "'", baglanti);

                    sil.ExecuteNonQuery();



                  

                    MessageBox.Show("Kayıt Başarıyla Silindi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);




                    try
                    {
                        anasayfa anasayfam = new anasayfa();
                        SqlCommand doldur = new SqlCommand("select kitapid, kitapadi, kitapaciklama,kitapyazar,kitapyayinevi,kitapsayfasayisi from kitaplar where kullaniciid='" + kullanicisirano + "'", baglanti);

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
            else
            {
                
            }

            




        }

        private void simpleButton1_Click(object sender, EventArgs e)
        {
            this.WindowState = FormWindowState.Minimized;
        }
    }
}
