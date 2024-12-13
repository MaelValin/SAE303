import {getRequest} from '../lib/api-request.js';

let Clients = {};

Clients.fetch= async function(id){
    let data = await getRequest('clients/'+id);
    return data;

}

Clients.fetchAll = async function(){
    let data = await getRequest('clients');
    return data;
}

Clients.fetchIteration9category= async function(id){
    let data = await getRequest('clients?stat=iteration9category&id='+id);
    return data;

}

Clients.fetchIteration9product= async function(id){
    let data = await getRequest('clients?stat=iteration9product&id='+id);
    return data;

}

Clients.fetchIteration9allcategory= async function(){
    let data = await getRequest('clients?stat=iteration9allcategory');
    return data;

}

Clients.fetchIteration9allproduct= async function(){
    let data = await getRequest('clients?stat=iteration9allproduct');
    return data;

}

Clients.fetchIteration9client= async function(){
    let data = await getRequest('clients?stat=iteration9client');
    return data;

}



export {Clients};