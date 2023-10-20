<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
<title>Title</title>
</head>
<body>
<section>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-9">
                <h5>Resgister table</h5>
                <span id="Msg"></span>
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                       
                    </tbody>
                </table>
            </div>
            <div class="col-md-3">
                <h5>Resgister Form</h5>
                <form name="registerForm">
                    <div class="form-group mb-2">
                        <label for="">Name</label>
                        <input name="registerName" type="text" class="form-control">
                        <span id="nameError" class="text-danger font-italic"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Email</label>
                        <input name="registerEmail" type="text" class="form-control">
                        <span id="emailError" class="text-danger font-italic"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Password</label>
                        <input  name="registerPassword" type="text" class="form-control">
                        <span id="passwordError" class="text-danger font-italic"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Role</label>
                        <input name="registerRole" type="text" class="form-control">
                        <span id="roleError" class="text-danger font-italic"></span>
                    </div>
                    <div class="form-group mb-2">
                        <label for="">Status</label>
                        <input name="registerStatus" type="text" class="form-control">
                        <span id="statusError" class="text-danger font-italic"></span>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-sm btn-primary btn-block">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-uppercase" id="exampleModalLongTitle">Edit Form</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
         <form name="registerEditForm">
            <div class="modal-body">           
                <div class="form-group">
                    <label for="editName" class="mb-2">Edit your name</label>
                    <input type="text" name="registerEditName" id="editName" class="form-control">
                    <span id="editNameError"></span>
                </div>
                <div class="form-group">
                    <label for="editEmail" class="mb-2">Edit your email</label>
                    <input type="text" name="registerEditEmail" id="editEmail" class="form-control">
                    <span id="editEmailError"></span>
                </div>
                <div class="form-group">
                    <label for="editPassword" class="mb-2">Edit your password</label>
                    <input type="text" name="registerEditPassword" id="editPassword" class="form-control">
                    <span id="editPasswordError"></span>
                </div>
                <div class="form-group">
                    <label for="editRole" class="mb-2">Edit your role</label>
                    <input type="text" id="editRole" name="registerEditRole" class="form-control">
                    <span id="editRolwError"></span>
                </div>
                <div class="form-group">
                    <label for="editStatus" class="mb-2">Edit your status</label>
                    <input type="text" id="editStatus" name="registerEditStatus" class="form-control">
                    <span id="editStatusError"></span>
                </div>      
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-sm">Update</button>
            </div>
        </form>
    </div>
  </div>
</div>
<!-- Axios js -->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<!-- Optional JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<!-- Popper.js first, then Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
<script>
    let tableBody = document.querySelector('#tableBody');
    //for reagding data from database
    axios.get('api/register')
        .then(response => {
            response.data.register.forEach((item)=>{
                tableData(item); 
            })
        })
        .catch(err => {
            if( err.response.status ==404){
                console.log(err.response.config.url + ' url is not found!');
            }
    });


    //for registeration

   let registerForm = document.forms['registerForm'];
   let registerName= registerForm['registerName'];
   let registerEmail =registerForm['registerEmail'];
   let registerPassword=registerForm['registerPassword'];
   let registerRole =registerForm['registerRole'];
   let registerStatus =registerForm['registerStatus'];
   let nameError =document.getElementById('nameError');
   let emailError =document.getElementById('emailError');
   let passwordError=document.getElementById('passwordError');
   let roleError=document.getElementById('roleError');
   let statusError=document.getElementById('statusError');

    registerForm.onsubmit = (e)=>{
        e.preventDefault();
        axios.post('api/register',{
            name : registerName.value,
            email: registerEmail.value,
            password : registerPassword.value,
            role : registerRole.value,
            status : registerStatus.value,
        })
            .then(res => {   
                console.log(res.data);
                if(res.data.msg == 'Registeration successfully'){
                    successMsg(res.data.msg);
                    tableData(res.data.register)            
                        registerForm.reset(); 
                        nameError.innerHTML =emailError.innerHTML=passwordError.innerHTML=roleError.innerHTML =statusError.innerHTML= '';
                    
                }else{
                        nameError.innerHTML = registerName.value == '' ? res.data.msg.name : '';
                        emailError.innerHTML = registerEmail.value == '' ? res.data.msg.email : '';
                        passwordError.innerHTML = registerPassword.value == '' ? res.data.msg.password : '';
                        roleError.innerHTML = registerRole.value == '' ? res.data.msg.role : '';
                        statusError.innerHTML = registerStatus.value == '' ? res.data.msg.status : '';   
                }
                
               
            })
            .catch(err => {
                  console.log(err.response)
            })

}

        //for editing from databse
        let registerEditForm = document.forms['registerEditForm'];
        let registerEditName = registerEditForm['registerEditName'];
        let registerEditEmail =registerEditForm['registerEditEmail'];
        let registerEditPassword=registerEditForm['registerEditPassword'];
        let registerEditRole =registerEditForm['registerEditRole'];
        let registerEditStatus =registerEditForm['registerEditStatus'];
        let registerUpdateId;
        

        let editBtn = (registerId) =>{
            registerUpdateId = registerId; 
            axios.get('api/register/'+registerId)
            .then(res => { 
                console.log(res)         
                 registerEditName.value= res.data.register.name;
                 registerEditEmail.value= res.data.register.email;
                 registerEditPassword.value= res.data.register.password;
                 registerEditRole.value= res.data.register.role;
                 registerEditStatus.value= res.data.register.status;
               
            })
            .catch(err => {
                    console.log(err.response) 
                });
        }


        //for update data 
        let ListOfId =document.getElementsByClassName('ListOfId');
        let ListOfName =document.getElementsByClassName('ListOfName');
        let ListOfEmail =document.getElementsByClassName('ListOfEmail');
        let ListOfPassword =document.getElementsByClassName('ListOfPassword');
        let ListOfRole =document.getElementsByClassName('ListOfRole');
        let ListOfStatus =document.getElementsByClassName('ListOfStatus');
        let ListOfAction =document.getElementsByClassName('ListOfAction');
        registerEditForm.onsubmit = (event)=>{
            event.preventDefault();
            axios.put('api/register/'+registerUpdateId, {
                name :registerEditName.value,
                email :registerEditEmail.value,
                password :registerEditPassword.value,
                role :registerEditRole.value,
                status :registerEditStatus.value,
            })
            .then((res) => {
                    for(let t=0;t<ListOfId.length;t++){
                        if(ListOfId[t].innerHTML == res.data.updatedData.id){
                            ListOfName[t].innerHTML = res.data.updatedData.name;
                            ListOfEmail[t].innerHTML = res.data.updatedData.email;
                            ListOfPassword[t].innerHTML = res.data.updatedData.password;
                            ListOfRole[t].innerHTML = res.data.updatedData.role;
                            ListOfStatus[t].innerHTML = res.data.updatedData.status;
                        }                     
                    }
                    console.log(res); successMsg(res.data.msg)
                    $('#editModal').modal('hide');
                })
            .catch((error) => {
                    console.error(error);
                });
            }

            //for delete data from database

            let deleteBtn = (deleteId)=>{
                if(confirm('Are you delete?')){
                    axios.delete('api/register/'+deleteId)
                    .then(res=>{
                        successMsg(res.data.msg);
                        for(let i =0; i<ListOfName.length;i++ ){
                            if(ListOfId[i].innerHTML == res.data.deletedData.id){
                                ListOfId[i].style.display=ListOfName[i].style.display=ListOfEmail[i].style.display=ListOfPassword[i].style.display=ListOfRole[i].style.display=ListOfStatus[i].style.display=ListOfAction[i].style.display = 'none';
                            }
                        }
                    })
                    .catch(err=>{
                        console.log(err.response)
                    })
                }
                
            }

    //Don't be repeat your code

    let tableData = (data)=>{
        tableBody.innerHTML += 
                                '<tr>'+
                                    '<td class="ListOfId">'+ data.id+'</td>'+
                                    '<td class="ListOfName">'+ data.name+'</td>'+
                                    '<td class="ListOfEmail">'+ data.email+'</td>'+
                                    '<td class="ListOfPassword">'+ data.password+'</td>'+
                                    '<td class="ListOfRole">'+ data.role+'</td>'+
                                    '<td class="ListOfStatus">'+ data.status+'</td>'+
                                    '<td class="ListOfAction"><button class="btn btn-primary btn-sm mr-2" data-toggle="modal" onclick="editBtn('+data.id+')" data-target="#editModal">Edit</button><button onclick="deleteBtn('+data.id+')" class="btn btn-danger btn-sm">Delete</button></td>'+
                                '</tr>';
    }

    //for success alert message
    let successMsg = (Msg)=>{
        document.querySelector('#Msg').innerHTML ='<div class="alert alert-success alert-dismissible fade show" role="alert">'+Msg+'<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>';
    }

</script>


</body>
</html>