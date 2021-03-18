using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace Kişisel_Kütüphane
{
    public partial class kitapdetay : Form
    {

        //kitap detay değişkenler
        public int kitapid { get; set; }
        public string kitapad { get; set; }
        public string kitapaciklama { get; set; }
        public string kitapyazar { get; set; }
        public string kitapsayfasayisi{ get; set; }
        public string kitapyayinevi { get; set; }
        public string kitapozet { get; set; }


        public kitapdetay()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            this.Close();
        }

        private void kitapdetay_Load(object sender, EventArgs e)
        {
            
            try
            {
                label2.Text = kitapad;
                label3.Text = kitapaciklama;
                label4.Text = kitapyazar;
                label5.Text = kitapyayinevi;
                label6.Text = kitapsayfasayisi;
                flatTextBox1.Text = kitapozet;
            }
            catch 
            {

                MessageBox.Show("Bir Hata Meydana Geldi..", "Bilgi", MessageBoxButtons.OK, MessageBoxIcon.Error);

            }

            if (flatTextBox1.Text == "")
            {
                flatTextBox1.Text = "Özet Bulunamadı..";
            }
           
        }

        private void formSkin1_Click(object sender, EventArgs e)
        {

        }

        private void simpleButton1_Click(object sender, EventArgs e)
        {
            this.WindowState = FormWindowState.Minimized;
        }
    }
}
