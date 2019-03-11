<?xml version="1.0"?>

<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">

<html>
<link rel="stylesheet" type="text/css" href="movies.css">

	<body>
		<h2>A Movie Collection</h2>
		<table border="1">
			<tr id="firstelem">
				<th>Title</th>
				<th>Genre</th>
				<th>Year</th>
				<th>Budget</th>
				<th>Director</th>
			</tr>
			<xsl:for-each select="collection/movie">
			<tr>
			      <td id="first"><xsl:value-of select="title"/></td>
		              <td id="second"><xsl:value-of select="genre"/></td>
	       	              <td id="third"><xsl:value-of select="year"/></td>
							 <td id="fourth"><xsl:value-of select="budget"/></td>
							 	<td id="fifth"><xsl:value-of select="director"/></td>
			</tr>
			</xsl:for-each>
		</table>
	</body>
</link>
</html>


</xsl:template>
</xsl:stylesheet>