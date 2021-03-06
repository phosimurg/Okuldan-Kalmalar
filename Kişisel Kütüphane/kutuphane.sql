USE [kutuphane]
GO
/****** Object:  Table [dbo].[kitaplar]    Script Date: 30.04.2020 10:31:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[kitaplar](
	[kitapid] [int] IDENTITY(1,1) NOT NULL,
	[kitapadi] [varchar](200) NULL,
	[kitapaciklama] [varchar](400) NULL,
	[kitapyazar] [varchar](200) NULL,
	[kitapozet] [ntext] NULL,
	[kitapyayinevi] [varchar](200) NULL,
	[kitapsayfasayisi] [varchar](25) NULL,
	[kitapresim] [varchar](200) NULL,
	[kullaniciid] [int] NULL,
 CONSTRAINT [PK_kitaplar] PRIMARY KEY CLUSTERED 
(
	[kitapid] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[uyeler]    Script Date: 30.04.2020 10:31:18 ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[uyeler](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[kullaniciadi] [varchar](200) NOT NULL,
	[sifre] [varchar](200) NOT NULL,
	[uyetip] [bit] NULL,
 CONSTRAINT [PK_uyeler] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[kitaplar] ON 

INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (1, N'Robinson Crusoe', N'yalnız bir adamın adada mahsur kalma hikayesi', N'ahmet yıldız', N'asfasfafsedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedenemedeneme', N'yıldız yayınları', N'254', N'C:\Users\Ahmet YILDIZ\Desktop\memin.jpg', 1)
INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (2, N'Don Kişot', N'şizofren bir lordun hikayesi', N'ahmet yıldız', N'askjfknas fnmasöfasfasfasf', N'yıldız yayınları', N'315', N'img/don.jpg', 1)
INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (3, N'Beyaz Diş', N'bir kurtun yaşamı', N'ahmet yıldız', N'asf anskçfman sfnkçasm.lföhasnkçf ', N'yıldız yayınları', N'187', N'img/beyazdis.jpg', 3)
INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (4, N'Vahşetin Çağrısı', N'melez bir kurtun yaşamı', N'ahmet yıldız', N'asjlfkmasjflask.mfbakjsç.fknasfnçmas.fnasmfnçasömnföç ', N'yıldız yayınları', N'152', N'img/vahset.jpg', 3)
INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (10, N'Dünyanın Merkezine Yolculuk', N'bayağı güzel birafasfasfasf', N'ahmet yıldız', N'merhaba deneme', N'yıldız yayınları', N'188', NULL, 1)
INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (15, N'asd', N'asd', N'sd', N'mmmmkkkkkkkmmmadasdasd', N'sd', N'12', NULL, 5)
INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (16, N'deneme', N'güzel kitaptır inşallah', N'ahmet yıldız', N'bir varmış bir yokmuş', N'yıldız yayınları', N'123', NULL, 5)
INSERT [dbo].[kitaplar] ([kitapid], [kitapadi], [kitapaciklama], [kitapyazar], [kitapozet], [kitapyayinevi], [kitapsayfasayisi], [kitapresim], [kullaniciid]) VALUES (18, N'deneme2', N'baya güzel kitaptır inş', N'ahmet yıldız', NULL, N'keser yayıncılık', N'712', NULL, 5)
SET IDENTITY_INSERT [dbo].[kitaplar] OFF
SET IDENTITY_INSERT [dbo].[uyeler] ON 

INSERT [dbo].[uyeler] ([id], [kullaniciadi], [sifre], [uyetip]) VALUES (1, N'admin', N'admin', 1)
INSERT [dbo].[uyeler] ([id], [kullaniciadi], [sifre], [uyetip]) VALUES (3, N'useme123', N'ay12300Y', NULL)
INSERT [dbo].[uyeler] ([id], [kullaniciadi], [sifre], [uyetip]) VALUES (5, N'a', N'a', NULL)
INSERT [dbo].[uyeler] ([id], [kullaniciadi], [sifre], [uyetip]) VALUES (9, N'phoenix2071', N'ay12300Y', NULL)
INSERT [dbo].[uyeler] ([id], [kullaniciadi], [sifre], [uyetip]) VALUES (12, N'phosimurg', N'ay12300Y', NULL)
INSERT [dbo].[uyeler] ([id], [kullaniciadi], [sifre], [uyetip]) VALUES (15, N'deneme', N'deneme', NULL)
SET IDENTITY_INSERT [dbo].[uyeler] OFF
ALTER TABLE [dbo].[kitaplar]  WITH CHECK ADD  CONSTRAINT [FK_kitaplar_uyeler] FOREIGN KEY([kullaniciid])
REFERENCES [dbo].[uyeler] ([id])
GO
ALTER TABLE [dbo].[kitaplar] CHECK CONSTRAINT [FK_kitaplar_uyeler]
GO
