<template>
    <div>
        <div v-if="!image.length">
        <textarea rows="5" required class="form-control" v-model="description" id="description" placeholder="Quoi de neuf?" ></textarea>
        <br>
        <div style="position:relative;display:inline-block;">
            <div style="border:1px solid #ddd; border-radius:10px; background-color:#efefef; padding: 3px 10px 3px 10px;">
                <i class="fa fa-file-image-o"></i>  <b>photo</b> 
            <input multiple accept="image/*" type="file" @change="onFileChange" style="position:absolute; left:0;top:0;opacity:0;"></div>
        </div>
        <button type="submit" class="btn btn-success pull-right" :disabled="not_working" @click="addPost()">Publier</button>
        </div>
        
        <div v-else>
            <textarea rows="5" required class="form-control" v-model="description" id="description" placeholder="Quoi de neuf?" ></textarea>
        <br>
            
            <div v-for="(i,index) in image">
                <div class="upload_wrap" >  
                 <img :src="i" alt="" style="width:100px; margin:10px"> 
                <b @click="removeImg(i)" style="top:0; right:0; position:absolute;cursor:pointer">x</b>
                </div>
            </div> 
            
            <div>
                <div style="position:relative;display:inline-block;">
            <div style="border:1px solid #ddd; border-radius:10px; background-color:#efefef; padding: 3px 10px 3px 10px;">
                <i class="fa fa-file-image-o"></i>  <b>photo</b> 
            <input multiple accept="image/*" type="file" @change="onFileChange" style="position:absolute; left:0;top:0;opacity:0;"></div>
        </div>
                
                
                            <button type="submit" class="btn btn-success pull-right" @click="uploadImg">Publier</button>

            </div>
        </div>
        
        
    </div>
</template>

<script>
    export default {
        name: "Posts",

        data(){
            return{
                description:'',
                not_working:true,
                image:[],
            }
        },

        methods:{
          addPost(){


              axios.post('/addPost',{
                  description : this.description
              }).then((response) => {
                  this.description="";
                  this.$store.commit('add_post', response.data);

                   this.$noty.success( 'votre post a bien été publié.', {
                        killer: true,
                        timeout: 6000,
                        layout: 'bottomLeft'
                    });

        

              }).catch(function (error) {
                  console.log(error)

              })
          },

          onFileChange(e){
              console.log(e);
              var files = e.target.files || e.dataTransfer.files;
              for(var i=0; i<files.length;i++){
                this.createImg(files[i])
              }
              //

          },

          createImg(file){
              var image = new Image;
              var reader = new FileReader;

              reader.onload = (e) =>{
                  this.image.push(e.target.result);
              };

              reader.readAsDataURL(file);
          },

          uploadImg(){
              axios.post('/saveImg',{
                  image : this.image,
                  description : this.description
              }).then((response) => {
                  this.description="";
                  this.image=[];
                  this.$store.commit('add_post', response.data);

                   this.$noty.success( 'votre post a bien été publié.', {
                        killer: true,
                        timeout: 6000,
                        layout: 'bottomLeft'
                    });

              }).catch(function (error) {
                  console.log(error)

              })
          },

          removeImg(i){
             // this.image.splice(i)
             this.image.splice(this.image.indexOf(i), 1);
          }
        },

        watch:{
            description(){
                if(this.description.length>0){
                    this.not_working=false
                }else{
                    this.not_working=true
                }
            }
        },
    }
</script>

<style scoped>
.upload_wrap{
    position: relative;
    display: inline-block;
}
</style>
