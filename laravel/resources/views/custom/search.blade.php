<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<div class="input-field">
    <input id="search" type="text" placeholder="Pesquisar">
    <label for="search">Pesquisar</label>
</div>

<script>
    $(document).ready(function () {
      $('#search').on('input', function () {
        var searchTerm = $(this).val().toLowerCase();
  
        $('table tbody tr').each(function () {
          var title = $(this).find('td:nth-child(2)').text().toLowerCase();
          var author = $(this).find('td:nth-child(3)').text().toLowerCase();
          var genre = $(this).find('td:nth-child(4)').text().toLowerCase();
  
          if (title.includes(searchTerm) || author.includes(searchTerm) || genre.includes(searchTerm)) {
            $(this).show();
          } else {
            $(this).hide();
          }
        });
      });
    });
  </script>