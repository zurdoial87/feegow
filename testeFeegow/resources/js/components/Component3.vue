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

                <h2 class="card-text text-center">Gestão de funcionarios</h2>

                <div class="row" style="padding-top: 50px;">
                    <button type="submit" class="btn btn-primary ml-3 mb-4" data-toggle="modal" data-target="#formInserirFun" title="Inserir"><i class="fa fa-solid fa-plus"></i> Inserir funcionario</button>
					<div class="col-lg-12">
						<div class="card mb-4 p-4">
                            
							<table class="table table-bordered table-striped table-hover" id="tabela-funcionario">

                                <thead>
                                    <tr>
                                    <th scope="col">CPF</th>
                                    <th scope="col">Nome</th>
                                    <th scope="col">Vacina</th>
                                    <th scope="col">Data 1ra dose</th>
                                    <th scope="col">Data 2da dose</th>
                                    <th scope="col">Data 3ra dose</th>
                                    <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr v-for="funcionario in funcionarios[0]" :key="funcionario.id">
                                    <th scope="row">{{funcionario.CPF}}</th>
                                    <td>{{funcionario.nome}}</td>
                                    <td>{{funcionario.vacina.nome}}</td>
                                    <td>{{funcionario.data_primeira_dose}}</td>                         
                                    <td v-if="funcionario.data_segunda_dose">{{funcionario.data_segunda_dose}}</td>
                                    <td v-else>Sem receber</td>                                    
                                    <td v-if="funcionario.data_terceira_dose">{{funcionario.data_terceira_dose}}</td>
                                    <td v-else>Sem receber</td>

                                    <td style="width: 12%;">                                        
                                        <button type="submit" class="btn btn-primary btn-edit" @click.prevent.self="edit(funcionario.id)" data-toggle="modal" data-target="#formEditFun" title="Editar"><i class='fa fa-pencil'></i></button>
                                        
                                        <button type="submit" class="btn btn-danger btn-delete" @click.prevent.self="remover(funcionario.id)"  title="Remover"><i class="fa fa-times"></i></button>                                                                                              
                                        
                                    </td>
                                    </tr>
                                    
                                </tbody>
        
                            </table>
						</div>
					</div>
				</div>


                <div class="modal fade lg" id="formInserirFun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
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
                                    <h1 class="h3 mb-3 font-weight-normal">Dados Funcionario</h1>        
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="cpf">CPF*</label>
                                            <input type="number" id="cpf" name="cpf" class="form-control" v-model="cpf" placeholder="CPF" required="" autofocus="">

                                        </div>                                               
                                    </div>

                                     <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="nome">Nome*</label>
                                            <input type="text" id="nome" name="nome" class="form-control" v-model="nome" placeholder="Infome o nome" required="" autofocus="">
                                            
                                        </div>                                               
                                    </div>       
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_nac">Data de nascimento*</label>
                                            <input type="date" id="data_nac" name="data_nac" class="form-control" v-model="data_nac" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_dose_1">Data da 1ra dose*</label>
                                            <input type="date" id="data_dose_1" name="data_dose_1" class="form-control" v-model="data_dose_1" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>       
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_dose_2">Data da 2da dose</label>
                                            <input type="date" id="data_dose_2" name="data_dose_2" class="form-control" v-model="data_dose_2" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_dose_3">Data da 3ra dose</label>
                                            <input type="date" id="data_dose_3" name="data_dose_3" class="form-control" v-model="data_dose_3" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>       
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">

                                        <div  class="form-label-group mt-2">
                                            <label for="data_dose_3">Vacina Aplicada*</label>
                                            <v-select :options="vacinas" :reduce="countryg => countryg.id" label="nome" v-model="vacina_aplic" ></v-select>

                                        </div>
                                                                                      
                                    </div>

                                     <div class="col-sm-6">

                                        <div  class="form-label-group mt-2">
                                            <label for="data_dose_3">Portador de comorbidade?*</label>
                                            <v-select :options="List_comorb" :reduce="comorb => comorb.id" label="opcion" v-model="comorbidade" ></v-select>

                                        </div>
                                                                                      
                                    </div>       
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

                <div class="modal fade" id="formEditFun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
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
                                    <h1 class="h3 mb-3 font-weight-normal">Editar Funcionario</h1>        
                                </div>                                

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="cpf_edit">CPF</label>
                                            <input type="hidden" id="id" name="id" class="form-control" v-model="id"> 
                                            <input type="number" id="cpf_edit" name="cpf_edit" class="form-control" v-model="cpf_edit" placeholder="CPF" required="" autofocus="">

                                        </div>                                               
                                    </div>

                                     <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="nome_edit">Nome</label>
                                            <input type="text" id="nome_edit" name="nome_edit" class="form-control" v-model="nome_edit" placeholder="Infome o nome" required="" autofocus="">
                                            
                                        </div>                                               
                                    </div>       
                                </div>


                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_nac_edit">Data de nascimento</label>
                                            <input type="date" id="data_nac_edit" name="data_nac_edit" class="form-control" v-model="data_nac_edit" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_dose_1_edit">Data da 1ra dose</label>
                                            <input type="date" id="data_dose_1_edit" name="data_dose_1_edit" class="form-control" v-model="data_dose_1_edit" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>       
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_dose_2_edit">Data da 2da dose</label>
                                            <input type="date" id="data_dose_2_edit" name="data_dose_2_edit" class="form-control" v-model="data_dose_2_edit" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-label-group mt-2">
                                            <label for="data_dose_3_edit">Data da 3ra dose</label>
                                            <input type="date" id="data_dose_3_edit" name="data_dose_3_edit" class="form-control" v-model="data_dose_3_edit" placeholder="" required="">
                                            
                                        </div>                                                                                      
                                    </div>       
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">

                                        <div  class="form-label-group mt-2">
                                            <label for="">Vacina Aplicada</label>
                                            <v-select :options="vacinas" :reduce="countryg => countryg.id" label="nome" v-model="vacina_aplic_edit" ></v-select>

                                        </div>
                                                                                      
                                    </div>

                                     <div class="col-sm-6">

                                        <div  class="form-label-group mt-2">
                                            <label for="">Portador de comorbidade?</label>
                                            <v-select :options="List_comorb" :reduce="comorb => comorb.id" label="opcion" v-model="comorbidade_edit" ></v-select>

                                        </div>
                                                                                      
                                    </div>       
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
        funcionarios: [],
        List_comorb: [{id: '1', opcion: 'Sim'}, {id: '0', opcion: 'Não'}],
        cpf:"",
        nome:"",
        data_nac:"",
        data_dose_1:"",
        data_dose_2:"",
        data_dose_3:"",
        vacina_aplic:"",
        comorbidade:"",
        id:"",
        cpf_edit:"",
        nome_edit:"",
        data_nac_edit:"",
        data_dose_1_edit:"",
        data_dose_2_edit:"",
        data_dose_3_edit:"",
        vacina_aplic_edit:"",
        comorbidade_edit:""
           

    }
   },
   components: {
    vSelect
  },
   mounted(){
        this.getAllVacinas();
        this.getAllFuncionarios();
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
    async getAllFuncionarios(){

        axios.get("/all_funcionarios")
        .then(response => {
            
            if(response.data){
                      
                this.funcionarios= response.data;      
            }

        });
    },
    async inserir(){        

        
        if(this.cpf == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo cpf é obrigatorio!',
           
            }); 

        }else if(this.nome == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo nome é obrigatorio!',
                
            }); 

        }else if(this.data_nac == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo Data de nascimento é obrigatorio!',
                
            }); 

        }else if(this.data_dose_1 == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo Data da 1ra dose é obrigatorio!',
                
            }); 

        }else if(this.vacina_aplic == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo Vacina aplicada é obrigatorio!',
                
            }); 

        }else if(this.comorbidade == ""){

            Swal.fire({
                type: 'warning',
                title: 'Atenção',
                html: 'O campo Portador de comorbidade é obrigatorio!',
                
            }); 

        }else{

            
            axios.post("/save_funcionarios",{
                CPF: this.cpf,
                nome: this.nome,
                data_nascimento: this.data_nac,
                data_primeira_dose: this.data_dose_1,
                data_segunda_dose: this.data_dose_2,
                data_terceira_dose: this.data_dose_3,
                vacines_id: this.vacina_aplic,
                comorbidade: this.comorbidade
            })
            .then(response => {
                
                if(response.data == "success"){
                    
                    Swal.fire({
                        type: 'success',
                        title: 'Sucesso',
                        html: 'Funcionario adicionado com sucesso!',
                        onClose: function(){

                            $('#nome').val("");
                            $('#cpf').val("");
                            $('#data_nac').val(""); 
                            $('#data_dose_1').val("");
                            $('#data_dose_2').val("");
                            $('#data_dose_3').val("");                           
                            
                            window.location.reload();                                    
                        }
                    }); 

                    this.getAllFuncionarios();

                }else{

                    Swal.fire({
                        type: 'warning',
                        title: 'Atenção',
                        html: 'Já existe um funcionario com o cpf informado!',
                       
                    }); 

                }

            });
            
        }          

    },    
    async edit(id){

       this.id = id;
       axios.get("get_funcionario/"+id)
       .then(response => {
                        
            if(response.data){                
                
                this.cpf_edit         = response.data.CPF;
                this.nome_edit        = response.data.nome;
                this.data_nac_edit    = response.data.data_nascimento;
                this.data_dose_1_edit = response.data.data_primeira_dose;
                this.data_dose_2_edit = response.data.data_segunda_dose;
                this.data_dose_3_edit = response.data.data_terceira_dose;
                this.vacina_aplic_edit= response.data.vacines_id;
                this.comorbidade_edit = response.data.comorbidade;                
                

            }
        });
    },
    async update(id){

        axios.put("update_funcionario",{
        id:   this.id,    
        CPF: this.cpf_edit,
        nome: this.nome_edit,
        data_nascimento: this.data_nac_edit,
        data_primeira_dose: this.data_dose_1_edit,
        data_segunda_dose: this.data_dose_2_edit,
        data_terceira_dose: this.data_dose_3_edit,
        vacines_id: this.vacina_aplic_edit,
        comorbidade: this.comorbidade_edit
        
    })
    .then(response => {
        
        if(response.data == "success"){

            Swal.fire({
                type: 'success',
                title: 'Sucesso',
                html: 'Funcionario atualizado com sucesso!',
                    onClose: function(){

                        $('#nome_edit').val("");
                        $('#cpf_edit').val("");
                        $('#data_nac_edit').val(""); 
                        $('#data_dose_1_edit').val("");
                        $('#data_dose_2_edit').val("");
                        $('#data_dose_3_edit').val("");                           
                           
                        window.location.reload();                             
                                                                
                    }
            });            
            
            this.getAllFuncionarios();

        }

    });
    },
    async remover(id){

        
        Swal.fire({
            title: 'Você tem certeza que deseja excluir o funcionario selecionado?',
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

                
                axios.delete("delete_funcionario/"+id)
                .then(response => {
                    
                    if(response.data == "success"){ 

                        Swal.fire({
                            type: 'success',
                            title: 'Sucesso',
                            html: 'Funcionario removido com sucesso!'
                               
                        });       

                        this.getAllFuncionarios();

                    }

                });

            }
        })

        
    },    
    async gettable(){        

        axios.get("/all_funcionarios")
        .then(response => {

            $("#tabela-funcionario").DataTable({ 
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