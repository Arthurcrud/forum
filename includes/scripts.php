<script defer>
  // Input de pesquisa para filtrar os posts //////////////////////
  const searchInput = document.querySelector("#search-input")

  searchInput.addEventListener('change', (e) => {
    const target = e.target;
    const value = target.value;

    dispatchTime(() => {
      location.href = `index.php?search=${value}`;
    })
  })

  function dispatchTime(action) {
    let timer = ''

    clearTimeout(timer);

    timer = setTimeout(() => {
      if (action instanceof Function) {
        action()
      }
    }, 1000)
  }

  function getParams(paramName) {
    const params = new URL(document.location).searchParams;
    const search = params.get(paramName);
    return search || null
  }

  searchInput.value = getParams('search') || '';
  ///////////////////////////////////////////////////////////////
</script>