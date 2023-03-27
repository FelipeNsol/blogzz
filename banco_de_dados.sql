-- MySQL dump 10.13  Distrib 8.0.32, for Win64 (x86_64)
--
-- Host: localhost    Database: postagens
-- ------------------------------------------------------
-- Server version	8.0.32

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` bigint NOT NULL AUTO_INCREMENT,
  `title` text,
  `subtitle` text,
  `content` text,
  `categories` text,
  `creator` text,
  `image` text,
  `create_time` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1679938476 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1679922348,'Esse é o título da postagem','Esse é o subtítulo da postagem','Esse é o conteúdo da postagem','foo','admin','bar','2023-03-27 13:05:48'),(1679929365,'Nova postagem','Testando','TEste<h4>Teste</h4><h1>Teste</h1>','foo','admin','bar','2023-03-27 15:02:45'),(1679938475,'Aula 2','I\'m baby affogato blog actually bitters. Pabst jianbing gluten-free bruh tonx cronut small batch. Shabby chic skateboard ugh keytar, vegan big mood fingerstache blog beard pickled freegan bruh. Next level tumblr authentic tilde, PBR&B slow-carb yuccie chambray street art chillwave.','<p style=\"margin-bottom: 1.5em; color: rgb(4, 4, 2); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, Frutiger, &quot;Frutiger Linotype&quot;, Univers, Calibri, &quot;Gill Sans&quot;, &quot;Gill Sans MT&quot;, &quot;Myriad Pro&quot;, Myriad, &quot;Nimbus Sans L&quot;, &quot;Liberation Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 18.6267px; background-color: rgb(255, 254, 252);\">Grailed hot chicken kale chips, yuccie put a bird on it mukbang yr typewriter meditation flannel copper mug wayfarers hashtag. Gorpcore scenester kombucha heirloom. Af mustache venmo kinfolk thundercats pok pok cardigan hammock gochujang. Aesthetic snackwave jawn, migas keytar ramps tilde artisan chillwave yr. Shabby chic chicharrones twee lo-fi gastropub taxidermy gorpcore yr sriracha tumeric edison bulb pug. Chia art party crucifix poke gatekeep, brunch dreamcatcher artisan literally praxis lo-fi. Sriracha echo park big mood paleo.</p><p style=\"margin-bottom: 1.5em; color: rgb(4, 4, 2); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, Frutiger, &quot;Frutiger Linotype&quot;, Univers, Calibri, &quot;Gill Sans&quot;, &quot;Gill Sans MT&quot;, &quot;Myriad Pro&quot;, Myriad, &quot;Nimbus Sans L&quot;, &quot;Liberation Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 18.6267px; background-color: rgb(255, 254, 252);\">Street art listicle tumblr schlitz, photo booth keytar ascot neutral milk hotel woke chicharrones food truck. 3 wolf moon church-key shoreditch artisan. Chicharrones blue bottle cupping selfies woke distillery truffaut banh mi. Put a bird on it jianbing organic wayfarers cold-pressed. Pabst marfa 3 wolf moon sus cray, meh snackwave freegan food truck cornhole. Chambray keffiyeh kombucha forage salvia tote bag, put a bird on it pour-over meditation beard hoodie. Tumeric umami pork belly tousled letterpress same sriracha af jean shorts.</p><p style=\"margin-bottom: 1.5em; color: rgb(4, 4, 2); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, Frutiger, &quot;Frutiger Linotype&quot;, Univers, Calibri, &quot;Gill Sans&quot;, &quot;Gill Sans MT&quot;, &quot;Myriad Pro&quot;, Myriad, &quot;Nimbus Sans L&quot;, &quot;Liberation Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 18.6267px; background-color: rgb(255, 254, 252);\">Listicle bushwick affogato, yes plz Brooklyn mumblecore humblebrag sustainable tattooed. Butcher yr blackbird spyplane VHS 90\'s austin tumblr pug. Williamsburg poutine tumeric 3 wolf moon PBR&amp;B vibecession, edison bulb taiyaki mlkshk man bun franzen ugh. Swag leggings raclette sartorial.</p><p style=\"margin-bottom: 1.5em; color: rgb(4, 4, 2); font-family: &quot;Helvetica Neue&quot;, Helvetica, Arial, Frutiger, &quot;Frutiger Linotype&quot;, Univers, Calibri, &quot;Gill Sans&quot;, &quot;Gill Sans MT&quot;, &quot;Myriad Pro&quot;, Myriad, &quot;Nimbus Sans L&quot;, &quot;Liberation Sans&quot;, Tahoma, Geneva, sans-serif; font-size: 18.6267px; background-color: rgb(255, 254, 252);\">Chillwave semiotics everyday carry stumptown polaroid lomo. Biodiesel knausgaard glossier mustache heirloom. Typewriter tote bag fit before they sold out, mixtape vape bespoke. Chillwave prism before they sold out you probably haven\'t heard of them venmo wayfarers gorpcore solarpunk man bun activated charcoal. Neutral milk hotel organic meggings single-origin coffee thundercats actually street art edison bulb disrupt listicle chillwave hammock asymmetrical pinterest keffiyeh. Succulents sartorial thundercats actually twee cornhole paleo. Fit lomo tacos blue bottle vegan.</p>','lorem, ipsum, dolor, sit','admin','bar','2023-03-27 17:34:35');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-27 14:37:31
