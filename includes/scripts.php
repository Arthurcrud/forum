<script defer>
  const deletePostBtn = document.querySelector('.delete-btn');

 ////////////// Post Modal Scripts ////////////////
  window.onload = function() {
    const urlParams = new URLSearchParams(window.location.search);
    const modalOpen = Boolean(urlParams.get('modal'));

    if(modalOpen){
      const editModal = document.getElementById("modal2");
      var instance = M.Modal.getInstance(editModal)
      instance.open();
    }
  }

  const postContainer = document.querySelector("#posts");

  postContainer?.addEventListener("click", (e) => {
    const target = e.target;

    if(target.classList.contains("post-container")){
      const [post, id] = target.id.split("-");
      const urlParams = new URLSearchParams(window.location.search);
      urlParams.set("post_id", id);
      urlParams.set("modal", true);
      const newUrl = `${window.location.origin}${window.location.pathname}?${urlParams.toString()}`;
      
      window.history.pushState({ path: newUrl }, '', newUrl);
      window.location.href = newUrl;
  }
 ////////////////////////////////////////////////////////

  })

  /////////// Input de pesquisa para filtrar os posts //////////////////////
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

  // Post FormValidation
  const title = document.getElementById("post-title")
  const content = document.getElementById("post-content")
  const btnEnviar = document.getElementById("btn-enviar")

  btnEnviar.addEventListener("click", (e) => {
    [title, content].forEach(item => {
    item.classList.remove('invalid');
    const value = item.value;

    if(!value.length){
      item.classList.add("invalid");
      e.preventDefault();
    }
  })
  })

///////////////////////////

// Post Delete ////////////

deletePostBtn.addEventListener("click", async (e) => {
  const urlParams = new URLSearchParams(window.location.search);
  try {
    const post_id = urlParams.get("post_id");
    const response = await fetch(`../php_actions/remove_post.php?post_id=${post_id}`);
    const parsedResponse = response.json();

    if(response.status === 200){
      window.location.reload();
    }

  } catch (error) {
    console.log(error);
  }
})

</script>