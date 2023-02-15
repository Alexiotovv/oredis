 /*function data() {
    return {
            url:'http://localhost:3000/tipostabla',
            grado:[],
            gradointruccion :  function() 
            {
             
        
                 fetch(this.url/*, {
                mode: 'cors',
                method: 'GET',
                headers: new Headers({
                    'Content-Type': 'application/json',
                    'Access-Control-Allow-Origin': '*',
                    'Access-Control-Allow-Headers': 'Authorization, X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Allow-Request-Method'
                }),
            }).then(response => response.json()).then(
                  json=>{grado=json.results;console.log('json.results')})
            },
        
            title : 'peru'
     
    }
}*/
 function data() {
    return {
           url:'https://apps.regionloreto.gob.pe',
            grado :[],
            discapacidad:[],
            diagnostico:[],
            ayuda:[],
            ayudamecanica:[],
            seguro:[],
            estadocivil:[],
            docidentidad:[],
            parentesco:[],
            situacion:[],
            nam:false,
            namsecond:false,
            namsecondt:false,
            tipostabla:[],
            docDIDbool:false,
            certificadoFlag:false,
            datapersona:[],
            ubigeo:[],

            docdidbool : function(data){
                this.docDIDbool=data

            },

            prueba : function(data)
            {
                this.nam=data
                if(data==false)
                {
                    this.namsecond=false ,
                    this.namsecondt=false
                }
                console.log(data);
            },
            pruebasecond : function(data)
            {
                if(data==901)
                {
                    this.namsecond=true ,
                    this.namsecondt=false
                }
                if(data==902)
                {
                    this.namsecondt=true,
                    this.namsecond=false 
                }
                
                console.log(data);
            },
            
          postregistro : async function () {

            const datablock={
                Nombres:nombre
            }

              console.log(datablock)
          },
         
           gettipostabla : async function (){

           this.tipostabla= await axios.get(this.url + '/node/gorelinfoapi/app/tipostabla').then(
                function (response){
                    this.tipostabla=  response.data
                    //this.tipostabla.docidentidad=JSON.stringify( this.tipostabla.filter(item=>item.Grupo===100))
                    this.tipostabla.docidentidad=this.tipostabla.filter(item=>item.Grupo===100)
                    this.tipostabla.grado=this.tipostabla.filter(item=>item.Grupo===600)
                    this.tipostabla.discapacidad=this.tipostabla.filter(item=>item.Grupo===700)
                    this.tipostabla.diagnostico=this.tipostabla.filter(item=>item.Grupo===800)
                    this.tipostabla.ayuda=this.tipostabla.filter(item=>item.Grupo===900)
                    this.tipostabla.ayudamecanica=this.tipostabla.filter(item=>item.Grupo===1000)
                    this.tipostabla.seguro=this.tipostabla.filter(item=>item.Grupo===1100)
                    this.tipostabla.estadocivil=this.tipostabla.filter(item=>item.Grupo===1200)
                    console.log(this.tipostabla.docidentidad)
                    return this.tipostabla
                  
                }
            ).catch( function (error) {
                console.log(error)
            }

            )

           },

           getubigeo : async function (){

            this.ubigeo= await axios.get(this.url + '/node/gorelinfoapi/app/ubigeo').then(
                 function (response){
                   console.log(response.data)
                   return response.data
                     //this.tipostabla.docidentidad=JSON.stringify( this.tipostabla.filter(item=>item.Grupo===100))
                     //this.tipostabla.ubigeo=this.tipostabla.filter(item=>item.Codi===100)
                     
                    //return this.tipostabla
                   
                 }
             ).catch( function (error) {
                 console.log(error)
             }
 
             )
 
            }
    
    }
}