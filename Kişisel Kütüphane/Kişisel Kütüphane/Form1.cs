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
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
            

        }


        anasayfa anasayfaform = new anasayfa();

        SqlConnection baglanti = new SqlConnection(@"data source=PHOENIX2071; initial catalog=kutuphane; integrated security=true;");
       

        private void formSkin1_Click(object sender, EventArgs e)
        {

        }

        
         
        
        

        private void flatButton1_Click(object sender, EventArgs e)
        {


            if (flatTextBox1.Text != "" && flatTextBox2.Text != "")
            {
                anasayfaform.kullaniciadi = flatTextBox1.Text;
                try
                {
                    baglanti.Open();

                    SqlCommand uyesorgu = new SqlCommand("Select id,kullaniciadi,sifre From uyeler where kullaniciadi='" + flatTextBox1.Text + "' and sifre='" + flatTextBox2.Text + "'", baglanti);

                    SqlDataReader dr = uyesorgu.ExecuteReader();

                    if (dr.Read())
                    {
                        anasayfaform.kullanicino = Convert.ToInt32(dr[0]);
                        anasayfaform.kullaniciadi = flatTextBox1.Text;
                        anasayfaform.Show();
                        this.Hide();


                        
                    }

                    else
                    {
                        MessageBox.Show("Kullanıcı adı veya şifre hatalı..", "Uyarı", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                        
                    }

                }

                catch
                {

                    MessageBox.Show("Bir Hata Meydana Geldi..", "Uyarı", MessageBoxButtons.OK, MessageBoxIcon.Warning);

                }

            }

            else
            {
                MessageBox.Show("Lütfen Kutucukları Boş Bırakmayın!", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);

            }




            baglanti.Close();


        }

        private void flatLabel3_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

       

        private void button1_Click(object sender, EventArgs e)
        {
            kayitol kayitform = new kayitol();
            kayitform.ShowDialog();
            this.Hide();
        }

        private void flatTextBox1_TextChanged(object sender, EventArgs e)
        {
            
        }
    }
}
