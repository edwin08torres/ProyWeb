// async function fntDelete(id) {
//   try {
//     let formData = new FormData();
//     formData.append("IDOE", id);
//     let resp = await fetch(base_url + "Controller/Oferta.php?op=eliminar", {
//       method: "POST",
//       mode: "cors",
//       cache: "no-cache",
//       body: formData,
//     });
//     json = await resp.json();
//     if (json.status) {
//       swal("Eliminar", json.msg, "success");
//       document.querySelector("#row_" + id).remove();
//     } else {
//       swal("Eliminar", json.msg, "error");
//     }
//   } catch (err) {
//     console.log("Ocurrio un error: " + err);
//   }
// }
