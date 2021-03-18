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
    public partial class kayitol : Form
    {
        public kayitol()
        {
            InitializeComponent();

            
        }
        Form1 girisform = new Form1();
        SqlConnection baglanti = new SqlConnection(@"data source=PHOENIX2071; initial catalog=kutuphane; integrated security=true;");
       

        private void flatLabel4_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void flatButton1_Click(object sender, EventArgs e)
        {



            if (flatTextBox3.Text == flatTextBox2.Text && flatTextBox1.Text.Length > 0 && flatTextBox2.Text.Length > 0 && flatTextBox3.Text.Length > 0)
                {

                      try
                 {
                    baglanti.Open();
                    SqlCommand ekle = new SqlCommand("Insert into uyeler(kullaniciadi,sifre) VALUES ('" + flatTextBox1.Text + "','" + flatTextBox2.Text + "')", baglanti);

                    ekle.ExecuteNonQuery();

                    MessageBox.Show("Kaydınız Başarıyla Eklenmiştir, Giriş Yapabilirsiniz..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);


                    flatTextBox1.Text = "";
                    flatTextBox2.Text = "";
                    flatTextBox3.Text = "";

                    this.Close();

                 }

                     catch
                         {

                             MessageBox.Show("Kayıt Ekleme Başarısız..", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Error);
                         }


                    }

               

             else
                {
                    MessageBox.Show("Lütfen Kutucukları Kontrol Edin..", "Uyarı", MessageBoxButtons.OK, MessageBoxIcon.Warning);
                }




        }

        private void button1_Click(object sender, EventArgs e)
        {
            girisform.Show();
            this.Hide();
        }
    }
}
