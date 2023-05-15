import React, { useState } from 'react'

export const AddTodo = ({addTodo}) => {
  const [title, setTitle] = useState("");
  const [desc, setDesc] = useState("");

  const submit = (e)=>{
    e.preventDefault();
    if(!title || !desc){
        alert("Title or Description cannot be blank");
    }
    else{
        addTodo(title, desc);
        setTitle("");
        setDesc("");
    }
  }

  return (
    <div className='container'>
        <h3 className='my-3'>Add a Todo</h3>
        <form onSubmit={submit}>
            <div class="form-group">
                <label for="title">Todo Title</label>
                <input type="text" value={title} onChange={(e) =>{setTitle(e.target.value)}} class="form-control" id="title"/>
            </div>
            <div class="form-group">
                <label for="desc">Todo Decription</label>
                <input type="text" value={desc} onChange={(e) =>{setDesc(e.target.value)}} class="form-control" id="desc"/>
            </div>
            <button type="submit" class="btn btn-sm btn-success">Add Todo</button>
        </form>
    </div>
 )
}
