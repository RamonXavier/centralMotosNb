-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Ago-2021 às 00:12
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `centralmotosnb`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bairro`
--

CREATE TABLE `bairro` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `valor_entrega` double(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `bairro`
--

INSERT INTO `bairro` (`id`, `nome`, `valor_entrega`) VALUES
(1, 'Adolfo Vireque', 10.50),
(2, 'Aeroporto', 12.50),
(3, 'Agt Espírito Santo', 0.00),
(4, 'Alto Bairu', 0.00),
(5, 'Alto dos Pinheiros', 0.00),
(6, 'Alto Pinheiros', 0.00),
(7, 'Alto Santo Antônio', 0.00),
(8, 'Amazônia', 0.00),
(9, 'Aracy', 0.00),
(10, 'Araújo', 0.00),
(11, 'Arco Íris', 0.00),
(12, 'Bairu', 0.00),
(13, 'Bandeirantes', 0.00),
(14, 'Barbosa Lage', 0.00),
(15, 'Barreira do Triunfo', 0.00),
(16, 'Barreira Triunfo', 0.00),
(17, 'Bela Aurora', 0.00),
(18, 'Benfica', 0.00),
(19, 'Boa Vista', 0.00),
(20, 'Bom Clima', 0.00),
(21, 'Bom Jardim', 0.00),
(22, 'Bom Passtor', 0.00),
(23, 'Bom Pastor', 0.00),
(24, 'Bom Sucesso', 0.00),
(25, 'Bonfim', 0.00),
(26, 'Bonsucesso', 0.00),
(27, 'Borboleta', 0.00),
(28, 'Borborema', 0.00),
(29, 'Bosque do Imperador', 0.00),
(30, 'Bosque dos Pinheiros', 0.00),
(31, 'Bqe Imperador', 0.00),
(32, 'Bqe Imperial II', 0.00),
(33, 'Bqe Pinheiros', 0.00),
(34, 'Cachoeira', 0.00),
(35, 'Caiçaras', 0.00),
(36, 'Caiçaras II', 0.00),
(37, 'Campo Alegre', 0.00),
(38, 'Carlos Chagas', 0.00),
(39, 'Cascatinha', 0.00),
(40, 'Centenário', 0.00),
(41, 'Centro', 0.00),
(42, 'Cerâmica', 0.00),
(43, 'Cesário Alvim', 0.00),
(44, 'Chales do Imperador', 0.00),
(45, 'Cidade Bethel', 0.00),
(46, 'Cidade do Sol', 0.00),
(47, 'Cidade Jardim', 0.00),
(48, 'Cidade Nova', 0.00),
(49, 'Costa Carvalho', 0.00),
(50, 'Cruzeiro do Sul', 0.00),
(51, 'Cruzeiro Sul', 0.00),
(52, 'Democrata', 0.00),
(53, 'Dias Tavares', 0.00),
(54, 'Distrito Industrial', 0.00),
(55, 'Dom Bosco', 0.00),
(56, 'Eldorado', 0.00),
(57, 'Encosta do Sol', 0.00),
(58, 'Esplanada', 0.00),
(59, 'Estrela Sul', 0.00),
(60, 'Fábrica', 0.00),
(61, 'Fazendinha São Pedro', 0.00),
(62, 'Filgueiras', 0.00),
(63, 'Floresta', 0.00);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `descricao` text COLLATE utf8_bin DEFAULT NULL,
  `dt_criacao` datetime DEFAULT NULL,
  `dt_prazo` datetime DEFAULT NULL,
  `dt_conclusao` datetime DEFAULT NULL,
  `id_status_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_motoboy` int(11) DEFAULT NULL,
  `id_bairro_origem` int(11) NOT NULL,
  `id_bairro_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `descricao`, `dt_criacao`, `dt_prazo`, `dt_conclusao`, `id_status_pedido`, `id_usuario`, `id_motoboy`, `id_bairro_origem`, `id_bairro_destino`) VALUES
(2, 'Descrição do pedido', '2021-06-19 21:04:12', '2021-06-19 21:04:12', '2021-06-19 21:04:12', 3, 4, 3, 1, 2),
(3, 'Descrição do pedido                                                                                                                                                ', '2021-06-19 21:04:12', '2021-06-23 00:00:00', '2021-06-30 00:00:00', 3, 2, 3, 4, 1),
(4, 'Descrição do pedido', '2021-06-19 21:04:12', '2021-06-19 21:04:12', '0000-00-00 00:00:00', 2, 4, 3, 1, 2),
(5, 'Descrição do pedido', '2021-06-19 21:04:12', '2021-06-19 21:04:12', '2021-06-19 21:04:12', 1, 4, 3, 1, 2),
(6, 'Descrição do pedido', '2021-06-19 21:04:12', '2021-06-19 21:04:12', '2021-06-21 21:04:12', 1, 1, 3, 1, 2),
(7, 'Descrição do pedido', '2021-06-19 21:04:12', '2021-06-19 21:04:12', '2021-06-19 21:04:12', 4, 4, 3, 1, 2),
(8, 'Descrição do pedido', '2021-06-19 21:04:12', '2021-06-19 21:04:12', '2021-06-19 21:04:12', 4, 4, 3, 1, 2),
(23, '?ççç', '2021-08-09 01:57:52', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 2, 1, 6, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `status_pedido`
--

CREATE TABLE `status_pedido` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `status_pedido`
--

INSERT INTO `status_pedido` (`id`, `nome`) VALUES
(1, 'Aberto'),
(2, 'Em Andamento'),
(3, 'Concluído'),
(4, 'Recusado'),
(5, 'Atrasado');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id` int(10) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tipousuario`
--

INSERT INTO `tipousuario` (`id`, `nome`) VALUES
(1, 'Motoboy'),
(2, 'Administrador'),
(3, 'Cliente'),
(4, 'ClienteAdministrador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(10) NOT NULL,
  `nome` varchar(200) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  `idTipoUsuario` int(11) NOT NULL,
  `telefone1` varchar(30) COLLATE utf8_bin NOT NULL,
  `telefone2` varchar(30) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `senha`, `idTipoUsuario`, `telefone1`, `telefone2`) VALUES
(1, 'duca2', '', 2, '(32)9999-7777', '(32)98888-6666'),
(2, 'ramon', '3a00413aa96c7e8697e6f150b3227c5b', 2, '(32)9999-9999', '(32)98888-8888'),
(3, 'rodrigo', '3a00413aa96c7e8697e6f150b3227c5b', 1, '(32)9999-9999', '(32)98888-8888'),
(4, 'cliente', '3a00413aa96c7e8697e6f150b3227c5b', 3, '(32)9999-9999', '(32)98888-8888'),
(5, 'clienteAdm', '3a00413aa96c7e8697e6f150b3227c5b', 4, '(32)9999-9999', '(32)98888-8888');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `bairro`
--
ALTER TABLE `bairro`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_status_pedido` (`id_status_pedido`),
  ADD KEY `fk_usuario` (`id_usuario`),
  ADD KEY `fk_usuario_motoboy` (`id_motoboy`),
  ADD KEY `fk_bairro_origem` (`id_bairro_origem`),
  ADD KEY `fk_bairro_destino` (`id_bairro_destino`);

--
-- Índices para tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_tipoUsuario` (`idTipoUsuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `bairro`
--
ALTER TABLE `bairro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `status_pedido`
--
ALTER TABLE `status_pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `fk_bairro_destino` FOREIGN KEY (`id_bairro_destino`) REFERENCES `bairro` (`id`),
  ADD CONSTRAINT `fk_bairro_origem` FOREIGN KEY (`id_bairro_origem`) REFERENCES `bairro` (`id`),
  ADD CONSTRAINT `fk_status_pedido` FOREIGN KEY (`id_status_pedido`) REFERENCES `status_pedido` (`id`),
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `fk_usuario_motoboy` FOREIGN KEY (`id_motoboy`) REFERENCES `usuario` (`id`);

--
-- Limitadores para a tabela `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_tipoUsuario` FOREIGN KEY (`idTipoUsuario`) REFERENCES `tipousuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
