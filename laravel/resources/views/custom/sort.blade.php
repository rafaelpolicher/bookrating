<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
      // Função para ordenar a tabela quando clicar no título da coluna
      $('th').click(function() {
        var table = $(this).parents('table').eq(0)
        var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
        this.asc = !this.asc
        if (!this.asc) {
          rows = rows.reverse()
        }
        for (var i = 0; i < rows.length; i++) {
          table.append(rows[i])
        }
      });
    
      // Função auxiliar para comparar valores e ordenar
      function comparer(index) {
        return function(a, b) {
          var valA = getCellValue(a, index),
            valB = getCellValue(b, index)
          if (index === 4) { // Índice 4 representa a coluna "Avaliação"
            valA = parseFloat(valA);
            valB = parseFloat(valB);
          }
          return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.toString().localeCompare(valB)
        }
      }
    
      // Função auxiliar para obter o valor da célula
      function getCellValue(row, index) {
        return $(row).children('td').eq(index).text()
      }
    });
    </script>