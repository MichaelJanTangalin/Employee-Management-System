<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  
  <xsl:template match="/">
    <html>
      <head>
        <title>My List Of Songs</title>
        <style>
          table {
            border-collapse: collapse;
          }

          td {
            padding: 10px;
          }
      </style>
      </head>
      <body>
      <center>
        <h1>My CD Collection</h1>
        <table border="1">
          <tr bgcolor="#9acd32">
            <th>Title</th>
            <th>Artist</th>
          </tr>

            <xsl:for-each select="Catalog/CD">
            <tr>
                <td><xsl:value-of select="title"/></td>
                <td><xsl:value-of select="artist"/></td>
              </tr>
            </xsl:for-each>

        </table>
        </center>
      </body>
    </html>
  </xsl:template>

</xsl:stylesheet>