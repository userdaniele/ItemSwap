-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Creato il: Mag 16, 2016 alle 21:01
-- Versione del server: 5.5.42
-- Versione PHP: 5.6.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_itemswap`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_buy`
--

CREATE TABLE `tb_buy` (
  `id` int(11) NOT NULL,
  `p_swapper_in` int(11) NOT NULL,
  `p_item_in` int(11) NOT NULL,
  `stato` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_categoria_figlia`
--

CREATE TABLE `tb_categoria_figlia` (
  `id` int(11) NOT NULL,
  `p_categoria_madre` int(11) NOT NULL,
  `nome_categoria_figlia` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_categoria_madre`
--

CREATE TABLE `tb_categoria_madre` (
  `id` int(11) NOT NULL,
  `nome_categoria` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_contrattazioni`
--

CREATE TABLE `tb_contrattazioni` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `p_swap` int(11) NOT NULL,
  `p_buy` int(11) NOT NULL,
  `p_swapper_in` int(11) NOT NULL,
  `p_swapper_out` int(11) NOT NULL,
  `importo` mediumint(9) NOT NULL,
  `messaggio` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_domande_item`
--

CREATE TABLE `tb_domande_item` (
  `id` int(11) NOT NULL,
  `p_item` int(11) NOT NULL,
  `p_swapper_in` int(11) NOT NULL,
  `p_swapper_out` int(11) NOT NULL,
  `domanda` text NOT NULL,
  `risposta` text NOT NULL,
  `data_domanda` date NOT NULL,
  `data_risposta` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_email`
--

CREATE TABLE `tb_email` (
  `id` int(11) NOT NULL,
  `p_swapper` int(11) NOT NULL,
  `oggetto` varchar(40) NOT NULL,
  `testo_email` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_img_item`
--

CREATE TABLE `tb_img_item` (
  `id` int(11) NOT NULL,
  `p_item` int(11) NOT NULL,
  `nome_img` varchar(500) NOT NULL,
  `path` varchar(500) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tb_img_item`
--

INSERT INTO `tb_img_item` (`id`, `p_item`, `nome_img`, `path`, `size`) VALUES
(1, 1, 'professional_sputacchiera', 'images/items/sputacchiera1.jpeg', 0),
(2, 2, 'amateur_sputacchiera', 'images/items/sputacchiera2.jpeg', 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_item`
--

CREATE TABLE `tb_item` (
  `id` int(11) NOT NULL,
  `p_swapper` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_categoria_figlia` int(11) NOT NULL,
  `nome_oggetto` text NOT NULL,
  `descrizione` text NOT NULL,
  `stato` tinyint(1) NOT NULL,
  `vendita` tinyint(1) NOT NULL,
  `scambio` tinyint(1) NOT NULL,
  `prezzo` float(4,2) NOT NULL,
  `data` date NOT NULL,
  `cont_like` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tb_item`
--

INSERT INTO `tb_item` (`id`, `p_swapper`, `id_categoria`, `id_categoria_figlia`, `nome_oggetto`, `descrizione`, `stato`, `vendita`, `scambio`, `prezzo`, `data`, `cont_like`) VALUES
(1, 1, 1, 1, 'Sputacchiera Professionale', 'Il nostro primo oggetto', 0, 0, 0, 12.00, '2016-05-02', 1),
(2, 2, 2, 2, 'Sputacchiera Amatoriale', 'Il nostro secondo oggetto', 0, 0, 0, 3.50, '2016-05-02', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_messaggi_privati`
--

CREATE TABLE `tb_messaggi_privati` (
  `id` int(11) NOT NULL,
  `p_item` int(11) NOT NULL,
  `p_swapper_in` int(11) NOT NULL,
  `p_swapper_out` int(11) NOT NULL,
  `messaggio` text NOT NULL,
  `data_messaggio` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_recensioni`
--

CREATE TABLE `tb_recensioni` (
  `id` int(11) NOT NULL,
  `p_swapper_in` int(11) NOT NULL,
  `p_swapper_out` int(11) NOT NULL,
  `commento` int(11) NOT NULL,
  `data` date NOT NULL,
  `punteggio` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_swap`
--

CREATE TABLE `tb_swap` (
  `id` int(11) NOT NULL,
  `p_swapper_in` int(11) NOT NULL,
  `p_swapper_out` int(11) NOT NULL,
  `p_item_in` int(11) NOT NULL,
  `p_item_out` int(11) NOT NULL,
  `stato` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_swapper`
--

CREATE TABLE `tb_swapper` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `info_geografica` varchar(500) NOT NULL,
  `account_paypal` varchar(200) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `tb_swapper`
--

INSERT INTO `tb_swapper` (`id`, `nome`, `cognome`, `email`, `username`, `password`, `info_geografica`, `account_paypal`) VALUES
(1, 'Mark ', 'Zuckerberg', 'mark.zucchina@faccialibro.com', 'mark_zucchina', 'e10adc3949ba59abbe56', 'rieti', 'magari'),
(2, 'Bill', 'Gates', 'porte@bill.com', 'bill_porte', 'e10adc3949ba59abbe56', 'pescasseroli', 'due'),
(3, 'testa', 'di', 'ciao@tumadre.it', 'cazzo', '$2y$10$ILFJ0y7VQtpPe', 'abruzzo', NULL),
(4, 'gggg', 'gggg', 'ggggg@kk.oi', 'ggggg', '$2y$10$UgHkvZ6n6w..j', 'abruzzo', NULL),
(5, 'ggggg', 'ggggg', 'ggggggg@ooo.pp', 'gggggggg', '$2y$10$fL72Gs1JOi8rP', 'abruzzo', NULL),
(6, 'ffff', 'fffff', 'r.dddd@hhh.it', 'ffffff', '$2y$10$CsxPchuV9.7LD', 'abruzzo', NULL),
(7, 'jjjj', 'jjjjj', 'jjjj@jjj.it', 'jjjjj', '$2y$10$AISEVZRyqAuUj', 'abruzzo', NULL),
(8, 'jjjj', 'jjjjj', 'jjjj@jjj.it', 'jjjjj', '$2y$10$vZ9ImCfz0FzX4', 'abruzzo', NULL),
(9, 'wwww', 'wwww', 'wwwww@oo.it', 'wwww', '$2y$10$Xk30yFDCwM4hr', 'abruzzo', NULL),
(10, 'roberto', 'ciaramaria', 'r.ciaramaria@gmail.com', 'rciaramaria', '$2y$10$R5vJogLxCiMnd', 'abruzzo', NULL),
(11, 'pippo', 'baudo', 'pippo@baudo.it', 'pippo', '$2y$10$BS3eUWFap3CnN', 'Sicilia ', NULL),
(12, 'massimo', 'boldi', 'massimo@boldi.it', 'massimo', '$2y$10$/a39cK.pwOYkWUEM5TYfSu8HxAttbrIENAtWMNqjmwhNf2bkbd9GO', 'Lombardia', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_swapper_info`
--

CREATE TABLE `tb_swapper_info` (
  `id` int(11) NOT NULL,
  `p_swapper` int(11) NOT NULL,
  `cont_recensioni_in` int(11) NOT NULL,
  `cont_recensioni_out` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_tipo_email`
--

CREATE TABLE `tb_tipo_email` (
  `id` int(11) NOT NULL,
  `p_email` int(11) NOT NULL,
  `verifica_account` int(11) NOT NULL,
  `msg_privato` int(11) NOT NULL,
  `msg_domanda` int(11) NOT NULL,
  `msg_contrattazione` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_transazioni`
--

CREATE TABLE `tb_transazioni` (
  `id` int(11) NOT NULL,
  `p_stato` int(11) NOT NULL,
  `p_swap` int(11) NOT NULL,
  `p_buy` int(11) NOT NULL,
  `p_importo` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `cognome` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `ruolo` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `tb_wish_list`
--

CREATE TABLE `tb_wish_list` (
  `id` int(11) NOT NULL,
  `p_swapper` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_categoria_figlia` int(11) NOT NULL,
  `tag` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `tb_buy`
--
ALTER TABLE `tb_buy`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_categoria_figlia`
--
ALTER TABLE `tb_categoria_figlia`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_categoria_madre`
--
ALTER TABLE `tb_categoria_madre`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_contrattazioni`
--
ALTER TABLE `tb_contrattazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_domande_item`
--
ALTER TABLE `tb_domande_item`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_email`
--
ALTER TABLE `tb_email`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_img_item`
--
ALTER TABLE `tb_img_item`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_item`
--
ALTER TABLE `tb_item`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_messaggi_privati`
--
ALTER TABLE `tb_messaggi_privati`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_recensioni`
--
ALTER TABLE `tb_recensioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_swap`
--
ALTER TABLE `tb_swap`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_swapper`
--
ALTER TABLE `tb_swapper`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_swapper_info`
--
ALTER TABLE `tb_swapper_info`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_tipo_email`
--
ALTER TABLE `tb_tipo_email`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_transazioni`
--
ALTER TABLE `tb_transazioni`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `tb_wish_list`
--
ALTER TABLE `tb_wish_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `tb_buy`
--
ALTER TABLE `tb_buy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_categoria_figlia`
--
ALTER TABLE `tb_categoria_figlia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_categoria_madre`
--
ALTER TABLE `tb_categoria_madre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_contrattazioni`
--
ALTER TABLE `tb_contrattazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_domande_item`
--
ALTER TABLE `tb_domande_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_email`
--
ALTER TABLE `tb_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_img_item`
--
ALTER TABLE `tb_img_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `tb_item`
--
ALTER TABLE `tb_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT per la tabella `tb_messaggi_privati`
--
ALTER TABLE `tb_messaggi_privati`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_recensioni`
--
ALTER TABLE `tb_recensioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_swap`
--
ALTER TABLE `tb_swap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_swapper`
--
ALTER TABLE `tb_swapper`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT per la tabella `tb_swapper_info`
--
ALTER TABLE `tb_swapper_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_tipo_email`
--
ALTER TABLE `tb_tipo_email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_transazioni`
--
ALTER TABLE `tb_transazioni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT per la tabella `tb_wish_list`
--
ALTER TABLE `tb_wish_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
