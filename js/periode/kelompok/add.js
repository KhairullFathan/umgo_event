$(document).ready(() => {
  const listMhs = [];
  let containerMhs = $(".mhs-list");
  let opsiMhs = $(".opsi-mhs");
  if(opsiMhs.length >= 1) {
    for(let i=0;i<opsiMhs.length;i++){
      if(opsiMhs[i].checked){
        let MahasiswaID = opsiMhs[i].getAttribute('data-id');
        let NIM = opsiMhs[i].getAttribute('data-nim');
        let NamaMahasiswa = opsiMhs[i].getAttribute('data-namamahasiswa');
        const selectedMhs = {
          MahasiswaID : MahasiswaID,
          NIM : NIM,
          NamaMahasiswa : NamaMahasiswa,
        }
        listMhs.push(selectedMhs);
      }
    }
    opsiMhs.on('click', function() {
      // console.log($(this).val());
      let MahasiswaID = $(this).data('id');
      let NIM = $(this).data('nim');
      let NamaMahasiswa = $(this).data('namamahasiswa');
      const selectedMhs = {
        MahasiswaID : MahasiswaID,
        NIM : NIM,
        NamaMahasiswa : NamaMahasiswa,
      }
      if($(this).is(':checked')){
        listMhs.push(selectedMhs);
      }else{
        let filter = listMhs.filter((val,index,arr)=>{
          if(val.MahasiswaID == selectedMhs.MahasiswaID){
            listMhs.splice(index,1);
          }
        })
      }
      containerMhs.empty();
      listMhs.forEach((item) => {
        let newChild = `<li class="list-group-item d-flex justify-content-between align-items-center">
          ${item.NIM} - ${item.NamaMahasiswa}
        </li>`;
        containerMhs.append(newChild);
      });
    })
  }
})