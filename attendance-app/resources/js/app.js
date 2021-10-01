require('./bootstrap');

import Vue from "vue"

const app = new Vue({
    el:"#add",
    data:{
        errors:[],
        id:null,
        LastName:null,
        FirstName:null
    },
    methods:{
        checkForm: function(e){
            this.errors= [];
            if(!this.id){
                this.errors.push("Id required");
            }else if(this.id<10000 || this.id>99999){
                this.errors.push("Id must be between 10000 and 99999");
            }
            if(!this.LastName){
                this.errors.push("Last Name required");
            }
            if(!this.FirstName){
                this.errors.push("First Name required");
            }

            if(!this.errors.length){
                return true;
            }

            e.preventDefault();
        }
    }
})