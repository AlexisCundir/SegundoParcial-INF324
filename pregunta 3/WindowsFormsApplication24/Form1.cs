using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Data.SqlClient;
using System.Drawing;
using System.Drawing.Imaging;
using System.Text;
using System.Windows.Forms;

namespace WindowsFormsApplication24
{
    public partial class Form1 : Form
    {
        int Rm, Gm, Bm;
        int Rmc, Gmc, Bmc, L=10;

        int Rchg, Gchg, Bchg;
        string newcol;

        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            openFileDialog1.FileName = string.Empty;
            openFileDialog1.Filter = "Archivos JPG|*.JPG|Archivos BMP|*.bmp";
            openFileDialog1.ShowDialog();
            if (openFileDialog1.FileName != string.Empty)
            {
                Bitmap bmp = new Bitmap(openFileDialog1.FileName);
                pictureBox1.Image = bmp;
            }
        }

        private void pictureBox1_MouseClick(object sender, MouseEventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Color c = new Color();
            c = bmp.GetPixel(e.X, e.Y);
            Rm = c.R;
            Gm = c.G;
            Bm = c.B;
            Rmc = 0; Gmc = 0; Bmc = 0;
            textBox1.Text = c.R.ToString();
            textBox2.Text = c.G.ToString();
            textBox3.Text = c.B.ToString();
            for (int i=e.X-((int)L/2);i<e.X+((int)L/2);i++)
                for (int j = e.Y - ((int)L / 2); j < e.Y + ((int)L / 2); j++)
                {
                    c = bmp.GetPixel(i, j);
                    Rmc = Rmc + c.R; Gmc = Gmc + c.G; Bmc = Bmc + c.B;
                }
            Rmc = (int)Rmc / (L*L);
            Gmc = (int)Gmc / (L*L);
            Bmc = (int)Bmc / (L*L);
            textBox1.Text = textBox1.Text +" "+Rmc.ToString();
            textBox2.Text = textBox2.Text +" "+Gmc.ToString();
            textBox3.Text = textBox3.Text +" "+Bmc.ToString();
            Rm = Rmc;
            Gm = Gmc;
            Bm = Bmc;

            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();

            con.ConnectionString = "server=DESKTOP-NEUR3IL\\SQLEXPRESS;user=alexis;pwd=1234;database=inf324E2P1";
            cmd.Connection = con;
            cmd.CommandText = "insert into colorimagen values(" + Rmc.ToString() + "," + Gmc.ToString()
                + "," + Bmc.ToString() + ",'" + textBox4.Text + "')";
            con.Open();
            cmd.ExecuteNonQuery();
            con.Close();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            for (int i = 0; i < bmp.Width;i++)
                for (int j = 0; j < bmp.Height; j++)
                {
                    c = bmp.GetPixel(i, j);
                    if (((Rm - 10 < c.R) && (c.R < Rm + 10)) && ((Gm - 10 < c.G) && (c.G < Gm + 10)) && ((Bm - 10 < c.B) && (c.B < Bm + 10)))
                        bmp2.SetPixel(i, j, Color.Black);  
                    else
                        bmp2.SetPixel(i, j, Color.FromArgb(c.R, c.G, c.B));
                }
            pictureBox1.Image = bmp2;
        }

        private void button4_Click(object sender, EventArgs e)
        {
            Rchg = 0; Gchg = 0; Bchg = 0;

            SqlConnection con = new SqlConnection();
            SqlCommand cmd = new SqlCommand();
            Bitmap bmp = new Bitmap(pictureBox1.Image);
            Bitmap bmp2 = new Bitmap(bmp.Width, bmp.Height);
            Color c = new Color();
            
            con.ConnectionString = "server=DESKTOP-NEUR3IL\\SQLEXPRESS;user=alexis;pwd=1234;database=inf324E2P1";
            cmd.Connection = con;
            cmd.CommandText = "select * from colorimagen where color != ''";
            con.Open();
            SqlDataReader rdr = cmd.ExecuteReader();
            while (rdr.Read())
            {
                Rm = rdr.GetInt32(0);
                Gm = rdr.GetInt32(1);
                Bm = rdr.GetInt32(2);
                newcol = rdr.GetString(3);
                bmp2 = new Bitmap(bmp.Width, bmp.Height);
                for (int i = 0; i < bmp.Width; i++)
                    for (int j = 0; j < bmp.Height; j++)
                    {
                        c = bmp.GetPixel(i, j);
                        if (((Rm - 10 < c.R) && (c.R < Rm + 10)) && ((Gm - 10 < c.G) && (c.G < Gm + 10)) && ((Bm - 10 < c.B) && (c.B < Bm + 10)))
                        {
                            Rchg = Convert.ToInt32(newcol.Substring(0, 2), 16);
                            Gchg = Convert.ToInt32(newcol.Substring(2, 2), 16);
                            Bchg = Convert.ToInt32(newcol.Substring(4, 2), 16);

                            bmp2.SetPixel(i, j, Color.FromArgb(Rchg, Gchg, Bchg));
                        }
                        else
                            bmp2.SetPixel(i, j, Color.FromArgb(c.R, c.G, c.B));
                    }
                bmp = bmp2;
            }
            pictureBox1.Image = bmp2;
            con.Close();
        }

        private void label4_Click(object sender, EventArgs e)
        {

        }
    }
}
