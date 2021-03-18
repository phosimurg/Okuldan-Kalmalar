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
    public partial class anasayfa : Form
    {

        SqlConnection baglanti = new SqlConnection(@"data source=PHOENIX2071; initial catalog=kutuphane; integrated security=true;");

        kitapozet kitapozetform =new kitapozet();
        kitapdetay kitapdetayform = new kitapdetay();
        kitapayar kitapayarform = new kitapayar();
        kullaniciayar kullaniciayarform = new kullaniciayar();
        public string kullaniciadi { get; set; }
        public int kullanicino { get; set;}

        

        public anasayfa()
        {
            InitializeComponent();


            
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Application.Exit();
        }

        private void kullanıcıAyarlarıToolStripMenuItem_Click(object sender, EventArgs e)
        {
            
            
        }

        private void formSkin1_Click(object sender, EventArgs e)
        {

        }

        private void gridControl1_Click(object sender, EventArgs e)
        {

        }

        private void anasayfa_Load(object sender, EventArgs e)
        {
            // TODO: This line of code loads data into the 'kutuphaneDataSet.kitaplar' table. You can move, or remove it, as needed.
            this.kitaplarTableAdapter.Fill(this.kutuphaneDataSet.kitaplar);

            kitapayarform.kullanicisirano = kullanicino;
            kitapozetform.kullanicisirano = kullanicino;
            kullaniciayarform.kullanicinick = kullaniciadi;

            Form1 girisform=new Form1();

           
            label1.Text = kullaniciadi;



            try
            {
                baglanti.Open();
                SqlCommand doldur = new SqlCommand("select * from kitaplar where kullaniciid='"+kullanicino+"'", baglanti);

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

        private void gridControl1_Click_1(object sender, EventArgs e)
        {
            
        }

        private void barButtonItem1_ItemClick(object sender, DevExpress.XtraBars.ItemClickEventArgs e)
        {

        }

        private void barButtonItem4_ItemClick(object sender, DevExpress.XtraBars.ItemClickEventArgs e)
        {
            kullaniciayarform.ShowDialog();
        }

        private void barButtonItem5_ItemClick(object sender, DevExpress.XtraBars.ItemClickEventArgs e)
        {
            kitapayarform.ShowDialog();
        }

        private void tileView1_SelectionChanged(object sender, DevExpress.Data.SelectionChangedEventArgs e)
        {
            
        }

        private void tileView1_FocusedRowChanged(object sender, DevExpress.XtraGrid.Views.Base.FocusedRowChangedEventArgs e)
        {
           

            try
            {
                DataRow dr = tileView1.GetDataRow(tileView1.FocusedRowHandle);

            if (dr !=null )
            {
                kitapdetayform.kitapid=Convert.ToInt32(dr[0]);
                kitapdetayform.kitapad=dr[1].ToString();
                kitapdetayform.kitapaciklama = dr[2].ToString();
                kitapdetayform.kitapyazar = dr[3].ToString();
                kitapdetayform.kitapozet= dr[4].ToString();
                kitapdetayform.kitapyayinevi = dr[5].ToString();
                kitapdetayform.kitapsayfasayisi=dr[6].ToString();
                kitapdetayform.ShowDialog();

            }
            }
            catch (Exception)
            {
                
                throw;
            }

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void barButtonItem1_ItemClick_1(object sender, DevExpress.XtraBars.ItemClickEventArgs e)
        {
            kitapozetform.ShowDialog();
        }

        private void simpleButton1_Click(object sender, EventArgs e)
        {
           this.WindowState = FormWindowState.Minimized;
        }

        private void barButtonItem2_ItemClick(object sender, DevExpress.XtraBars.ItemClickEventArgs e)
        {


            try
            {
                baglanti.Open();
                SqlCommand doldur = new SqlCommand("select * from kitaplar where kullaniciid='" + kullanicino + "'", baglanti);

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
    }
}
