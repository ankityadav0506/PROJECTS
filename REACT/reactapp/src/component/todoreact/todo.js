import React, {useState, useEffect} from 'react';
import "./style.css";

// GET THE LOCAL STORAGE DATA
const getLocalData = ()=>{
    const lists = localStorage.getItem("mytodolist");
    if(lists){
        return JSON.parse(lists);
    }
    else {
        return [];  
    }
};

const Todo = () => {
  const [inputdata, setInputData] = useState("");
  const [items, setItems] = useState(getLocalData());
  const [isEditItem, setIsEditItem] = useState("");
  const [toggleButton, setToggleButton] = useState(false);

//   ADDING ITEMS
  const addItem = () =>{
    if(!inputdata){
        alert('Please Enter Todo Name');
    }
    else if(inputdata && toggleButton){
        setItems(
            items.map((curElem)=>{
                if(curElem.id === isEditItem) {
                return {...curElem, name: inputdata};
                }
                return curElem;
            })
        )

        setIsEditItem("");
        setInputData();
        setToggleButton(false);
    }
    else{
        const myNewInputData = {
            id: new Date().getTime().toString(),
            name: inputdata,
        }
        setItems([...items, myNewInputData]);    
        setInputData("");
    }
  }

// EDITING HT ITEMS
const editItem = (index) =>{
    const item_todo_edited = items.find((curElem)=>{
        return curElem.id === index;
    })
    setIsEditItem(index);
    setInputData(item_todo_edited.name);
    setToggleButton(true);
}

// DELETING ITEMS
const deleteItem = (index) =>{
    const updatedItem = items.filter((curElem)=> {
        return curElem.id !== index;
    })
    setItems(updatedItem);
}

// REMOVE ALL ELEMENTS
const removeAll = ()=>{
    alert('REMOVE ALL ?');
    setItems([]);
}

// ADDING DATA TO LOCAL STORAGE
useEffect(() => {
    localStorage.setItem("mytodolist", JSON.stringify(items))
}, [items])

  return (
    <>
        <div className='main-div'>
            <div className='child-div'>
                <figure>
                    <img src='./images/todo.png' alt="todologo" />
                    <figcaption>Add Your List Here</figcaption>
                </figure>
                <div className='addItems'>
                    <input type="text" 
                        placeholder="✍ Add Item" 
                        className='form-control'
                        value={inputdata}
                        onChange={(event) =>setInputData(event.target.value)} 
                    />
                    {toggleButton ? (
                        <i className="far fa-edit add-btn" onClick={addItem}></i>
                    ):(
                        <i className="fa fa-plus add-btn" onClick={addItem}></i>
                    )}
                </div>


                {/* Show all items */}
                <div className='showItems'>
                    {items.map((curElem, index) =>{
                        return (
                            <div className='eachItem' key={curElem.id}>
                                <h3>{curElem.name}</h3>
                                <div className='todo-btn'>
                                    <i className="far fa-edit add-btn" 
                                    onClick={()=> editItem(curElem.id)}></i>

                                    <i className="far fa-trash-alt add-btn" 
                                    onClick={() =>deleteItem(curElem.id)}></i>
                                </div>
                            </div>
                        )
                    })}
                </div>

                {/* Remove all items */}
                <div className='showItems'>
                    <button className='btn effect04' data-sm-link-text="Remove All"
                    onClick={removeAll}>
                    <span>CHECK LIST</span></button>
                </div>
            </div>
        </div>
    </>
  )
}

export default Todo