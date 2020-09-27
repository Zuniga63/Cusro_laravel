window.addEventListener('load', () => {
  // document.getElementById('nestable').nestable().addEventListener('change', ()=>{
  //   console.log('cambio');
  // })
  // document.getElementById('nestable').nestable('collapseAll');
  $('#nestable').nestable().on('change', function () {
    let menu = JSON.stringify($('#nestable').nestable('serialize'));
    let token = document.querySelector('input[name=_token]').value;
    // $.ajax({
    //   url:'/admin/menu/guardar-orden',
    //   type: 'POST',
    //   dataType: 'JSON',
    //   data: {
    //     menu,
    //     _token: token
    //   },
    //   success:function(response){
    //     //TODO
    //     console.log(response);
    //   }
    // })

    fetch('/admin/menu/guardar-orden', {
      headers: {
        "Content-Type": "application/json",
        "Accept": "application/json, text-plain, */*",
        "X-Requested-With": "XMLHttpRequest",
        "X-CSRF-TOKEN": token
      },
      method: 'post',
      credentials: "same-origin",
      body: JSON.stringify({
        menu
      })
    })
      .then((data) => data.json())
      .then(data => {
        console.log(data);
      })
      .catch(function (error) {
        console.log(error);
      });
  })
  // $('#nestable').nestable('collapseAll');
})