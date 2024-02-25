<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <xsl:template match="/">
    <html>
      <head>
        <title>My List Of Songs</title>
      </head>
      <body>
        <h1>My List of Songs</h1>
        <table border="2">
          <tr bgcolor="#9acd32">
            <th>Title</th>
            <th>Artist</th>
            <th>Album</th>
            <th>Year</th>
          </tr>

            <xsl:for-each select="music/song">
            <tr>
                <td><xsl:value-of select="title"/></td>
                <td><xsl:value-of select="artist"/></td>
                <td><xsl:value-of select="album"/></td>
                <td><xsl:value-of select="year"/></td>
                </tr>
            </xsl:for-each>

        </table>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>