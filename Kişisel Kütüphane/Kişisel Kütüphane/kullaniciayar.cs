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
    public partial class kullaniciayar : Form
    {
        SqlConnection baglanti = new SqlConnection(@"data source=PHOENIX2071; initial catalog=kutuphane; integrated security=true;");

        public int secilenid = 1;

        public string kullanicinick { get; set;}

        public kullaniciayar()
        {
            InitializeComponent();
            DataRow dr = gridView1.GetDataRow(gridView1.FocusedRowHandle);
        }




        private void kullaniciayar_Load(object sender, EventArgs e)
        {

            SqlCommand doldur = new SqlCommand("select id,kullaniciadi,sifre from uyeler",baglanti);

            SqlDataAdapter da = new SqlDataAdapter(doldur);

            DataTable dt = new DataTable();
            
            da.Fill(dt);

            gridControl1.DataSource = dt;
            
            baglanti.Close();

        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void formSkin1_Click(object sender, EventArgs e)
        {

        }

        private void simpleButton1_Click(object sender, EventArgs e)
        {


            if (flatTextBox1.Text != "" && flatTextBox2.Text != "" && flatTextBox3.Text != "")
            {

                if (flatTextBox3.Text==flatTextBox2.Text)
                {


                    try
                    {
                        baglanti.Open();
                        SqlCommand ekle = new SqlCommand("insert into uyeler (kullaniciadi, sifre) values('" + flatTextBox1.Text + "','" + flatTextBox2.Text + "')", baglanti);

                        ekle.ExecuteNonQuery();
                        flatTextBox1.Text = "";
                        flatTextBox2.Text = "";
                        flatTextBox3.Text = "";

                        MessageBox.Show("Kullanıcı Başarıyla Eklendi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);



                        //tabloda ki verileri yenileme
                        SqlCommand doldur = new SqlCommand("select id,kullaniciadi,sifre from uyeler", baglanti);

                        SqlDataAdapter da = new SqlDataAdapter(doldur);

                        DataTable dt = new DataTable();

                        da.Fill(dt);

                        gridControl1.DataSource = dt;

                        ////////////////

                        baglanti.Close();

                    }
                    catch
                    {

                        MessageBox.Show("Kullanıcı Eklenemedi..", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Error);
                    }

                }

                else
                {
                    MessageBox.Show("Şifreler Eşleşmiyor..", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Warning);

                }


            }

            else
            {
                MessageBox.Show("Lütfen Kutucukları Boş Bırakmayın..", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Warning);
            }




        }

        private void flatTextBox3_TextChanged(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void flatTextBox2_TextChanged(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void flatTextBox1_TextChanged(object sender, EventArgs e)
        {

        }

        private void gridView1_FocusedRowChanged(object sender, DevExpress.XtraGrid.Views.Base.FocusedRowChangedEventArgs e)
        {
            DataRow dr = gridView1.GetDataRow(gridView1.FocusedRowHandle);

            if (dr != null)
            {
                secilenid=Convert.ToInt32(dr[0]);
                flatTextBox4.Text = dr[1].ToString();
                flatTextBox5.Text = dr[2].ToString();
            }

        }





        private void simpleButton2_Click(object sender, EventArgs e)
        {



            try
            {
                baglanti.Open();

                SqlCommand ekle = new SqlCommand("update uyeler set kullaniciadi='" + flatTextBox4.Text + "' ,  sifre='" + flatTextBox5.Text + "' where id='"+secilenid+"'", baglanti);

                ekle.ExecuteNonQuery();


                MessageBox.Show("Kayıt Başarıyla Eklendi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);


                try
                {

                    SqlCommand doldur = new SqlCommand("select id,kullaniciadi,sifre from uyeler", baglanti);

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





            DialogResult dialog = new DialogResult();
            dialog = MessageBox.Show("Kullanıcıyı Gerçekten Silmek İstiyor musunuz?", "Dikkat", MessageBoxButtons.YesNo, MessageBoxIcon.Warning);

            if (dialog == DialogResult.Yes && kullanicinick=="admin")
            {

                try
                {


                    baglanti.Open();

                    SqlCommand sil = new SqlCommand(" DELETE FROM uyeler WHERE id='" + secilenid + "'", baglanti);

                    sil.ExecuteNonQuery();





                    MessageBox.Show("Kayıt Başarıyla Silindi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Information);




                    try
                    {
                        anasayfa anasayfam = new anasayfa();
                        SqlCommand doldur = new SqlCommand("select * from uyeler", baglanti);

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
                MessageBox.Show("Kullanıcı Silme Yetkiniz Yok!", "Hata", MessageBoxButtons.OK, MessageBoxIcon.Error);
            }




        }

        private void simpleButton3_Click(object sender, EventArgs e)
        {
            this.WindowState = FormWindowState.Minimized;
        }
    }
}
