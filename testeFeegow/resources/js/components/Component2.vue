<template>


<div>
    
    <div class="jumbotron text-center">
        <h1 class="display-4 ">FEEGOW</h1>
        
        <h1>Sistema web de cadastro e controle de colaboradores vacinados</h1>
        <p class="lead">
            
        </p>
    </div> 
                        


<div class="container">

                

                <div class="row mt-5">
                   
                </div>

                <hr/>

                <h2 class="card-text text-center">Gestão de vacinas</h2>

               <div class="row" style="padding-top: 50px;">
                    <button type="submit" class="btn btn-primary ml-3 mb-4" data-toggle="modal" data-target="#formInserir" title="Inserir"><i class="fa fa-solid fa-plus"></i> Inserir vacina</button>
					<div class="col-lg-12">
						<div class="card mb-4 p-4">
                            
							<table class="table table-bordered table-striped table-hover" id="tabela-vacina">

                                <thead>
                                    <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Lote</th>
                                    <th scope="col">Data Validade</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="(vacina, index) in vacinas" :key="vacina.id">
                                    <th scope="row">{{index + 1}}</th>
                                    <td>{{vacina.nome}}</td>
                                    <td>{{vacina.lote}}</td>
                                    <td>{{vacina.data_validade}}</td>
                                    <td style="width: 12%;">

                                        <button type="submit" class="btn btn-primary btn-edit" @click.prevent.self="edit(vacina.id)" data-toggle="modal" data-target="#formEdit" title="Editar"><i class='fa fa-pencil'></i></button>
                                        
                                        <button type="submit" class="btn btn-danger btn-delete" @click.prevent.self="remover(vacina.id)"  title="Remover"><i class="fa fa-times"></i> </button>                                                                                              
                                        
                                    </td>
                                    </tr>
                                    
                                </tbody>
        
                            </table>
						</div>
					</div>
				</div>


                <div class="modal fade" id="formInserir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Inserir</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-signin mt-5 mb-5">
                                <div class="text-center mb-4">
                                    <h1 class="h3 mb-3 font-weight-normal">Dados Vacina</h1>        
                                </div>                               

                                <div class="form-label-group mt-2">
                                    <label for="nome">Nome</label>
                                    <input type="text" id="nome" name="nome" class="form-control" v-model="nome" placeholder="Nome" required="" autofocus="">

                                </div>

                                <div class="form-label-group mt-2">
                                    <label for="lote">Lote</label>
                                    <input type="text" id="lote" name="lote" class="form-control" v-model="lote" placeholder="Infome o lote" required="" autofocus="">
                                    
                                </div>

                                <div class="form-label-group mt-2">
                                    <label for="validade">Data Validade</label>
                                    <input type="date" id="validade" name="validade" class="form-control" v-model="validade" placeholder="" required="">
                                    
                                </div>                               
                                             
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"  @click.prevent.self="inserir()"  type="submit"><i class="fa fa-solid fa-plus"></i>  Inserir</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                        </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="formEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form class="form-signin mt-5 mb-5">
                                <div class="text-center mb-4">
                                    <h1 class="h3 mb-3 font-weight-normal">Editar Vacina</h1>        
                                </div>

                                <div class="form-label-group mt-2">
                                    <label for="nome">Nome</label>
                                    <input type="hidden" id="id" name="id" class="form-control" v-model="id">
                                    <input type="text" id="nome_edit" name="nome_edit" class="form-control" v-model="nome_edit" placeholder="Nome" required="" autofocus="">


                                </div>

                                <div class="form-label-group mt-2">
                                    <label for="lote_edit">Email address</label>
                                    <input type="text" id="lote_edit" name="lote_edit" class="form-control" v-model="lote_edit" placeholder="Email address" required="" autofocus="">
                                    
                                </div>

                                <div class="form-label-group mt-2">
                                    <label for="validade_edit">Data Validade</label>
                                    <input type="date" id="validade_edit" name="validade_edit" class="form-control" v-model="validade_edit" placeholder="phone" required="">
                                    
                                </div>
                                
                                
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary"  @click.prevent.self="update(id)"  type="submit" >Editar</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>                    
                        </div>
                        </div>
                    </div>
                </div>

</div>
</div>

 
    
</template>


<script>


import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';


export default {

    data(){
    return {        
        vacinas: [],
        nome: "",
        lote: "",
        validade:"",
        id:"",
        nome_edit:"",
        lote_edit:"",
        validade_edit:"",  
        img: "/img/vacina2.jpg",
        errors:""   

    }
   },
   components: {
    vSelect
  },
   mounted(){
        this.getAllVacinas();
        this.gettable();        
   },
   methods: {
    
    async getAllVacinas(){

        axios.get("/all_vacinas")
        .then(response => {
            
            if(response.data){
                      
                this.vacinas= response.data;      
            }

        });
    },
    async inserir(){        

        
        if(this.nome == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo nome é obrigatorio!',
           
        }); 

        }else if(this.lote == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo lote é obrigatorio!',
            
        }); 

        }else if(this.validade == ""){

            Swal.fire({
            type: 'warning',
            title: 'Atenção',
            html: 'O campo Data de validade é obrigatorio!',
            
        }); 

        }else{

            
            axios.post("/save_vacinas",{
                nome: this.nome,
                lote: this.lote,
                data_validade: this.validade
            })
            .then(response => {
                
                if(response.data == "success"){
                    
                    Swal.fire({
                        type: 'success',
                        title: 'Sucesso',
                        html: 'Vacina adicionada com sucesso!',
                        onClose: function(){

                            $('#nome').val("");
                            $('#lote').val("");
                            $('#validade').val(""); 

                            window.location.reload(); 
                                                                
                        }
                    }); 

                    this.getAllVacinas();

                }else{

                    Swal.fire({
                        type: 'erro',
                        title: 'Atenção',
                        html: 'Todos os campos são obrigatorios!',
                       
                    }); 

                }

            });
            
        }          

    },    
    async edit(id){

       this.id = id;
       axios.get("get_vacina/"+id)
       .then(response => {
                        
            if(response.data){                
                this.nome_edit= response.data.nome;
                this.lote_edit= response.data.lote;
                this.validade_edit= response.data.data_validade;
                
            }
        });
    },
    async update(id){

        axios.put("update_vacina",{
        id:   this.id,    
        nome: this.nome_edit,
        lote: this.lote_edit,
        data_validade: this.validade_edit
    })
    .then(response => {
        
        if(response.data == "success"){

            Swal.fire({
                type: 'success',
                title: 'Sucesso',
                html: 'Vacina atualizada com sucesso!',
                    onClose: function(){
                        
                        $('#nome_edit').val("");
                        $('#lote_edit').val("");
                        $('#validade_edit').val(""); 

                        window.location.reload(); 
                                                                
                    }
            });            
            
            this.getAllVacinas();

        }

    });
    },
    remover(id){

        
        Swal.fire({
            title: 'Você tem certeza que deseja excluir a vacina selecionada?',
            text: "Você não poderá reverter isso!",            
            type: "warning",
            animation: true,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sim, excluir!',
            cancelButtonText: "Agora não!",
            showLoaderOnConfirm: false
            }).then((result) => {
            if (result.value) {

                
                axios.delete("delete_vacina/"+id)
                .then(response => {
                    
                    if(response.data == "success"){ 

                        Swal.fire({
                            type: 'success',
                            title: 'Sucesso',
                            html: 'Vacina removida com sucesso!'
                               
                        });       

                        this.getAllVacinas();

                    }

                });

            }
        })

        
    },    
    async gettable(){        

        axios.get("/all_vacinas")
        .then(response => {

            $("#tabela-vacina").DataTable({ 
                dom: "<'row'<'col-xl-6'l><'col-xl-6'Tf>r>" +
                    "t" +
                    "<'row'<'col-xl-6'i><'col-xl-6'p>>",
                tableTools: {
                    sSwfPath: "assets/js/datatables/tabletools/copy_csv_xls_pdf.swf"
                }
            });

        });

    }

   }
    
}
</script>

<style scoped>
    #tabela-agenda-clinicas_filter {
			float: right;
		}

		.pagination {
			float: right;
		}

		table.table-bordered tbody td {
			padding: 10px;
			text-align: center;
		}

		table.dataTable thead>tr>th {
			padding: 10px;
			text-align: center;
		}
        .btn-edit{
            margin-right: 5px;
        }

        .btn-delete{
            width: 41%;
        }
</style>