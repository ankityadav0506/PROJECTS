import { useEffect } from "react";
import React from 'react';

const Stories = () => {

  let isLoading = true;  
  let API = "https://hn.algolia.com/api/v1/search?query=html";

  const fetchApiData = async(url) =>{
    try {
        const res = await fetch(url);
        const data = await res.json();
        console.log(data);
    } catch (error) {
        console.log(error);
    }
  }

  useEffect(() => {
   fetchApiData(API);
  }, []);

  if(isLoading){
    return (
        <>
        <h1>Loading......</h1>
        </>
    );
  }
  
  return (
        <h2>Get the latest Tech News here ...</h2>
    )
}

export default Stories