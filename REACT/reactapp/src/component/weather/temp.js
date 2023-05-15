import React, { useState, useEffect } from 'react';
import Weathercard from './weathercard';
import "./style.css";

const Temp = () => {
    const [searchValue, setSearchValue] = useState("28.25");
    const [tempInfo, setTempInfo] = useState({});

    const getWeatherInfo = async () =>{
        try {
            let url = `https://api.open-meteo.com/v1/forecast?latitude=${searchValue}&longitude=76.86&daily=weathercode,uv_index_clear_sky_max,rain_sum&current_weather=true&timeformat=unixtime&forecast_days=1&timezone=Asia%2FSingapore`;
            
            const res = await fetch(url);
            const data = await res.json();
            
            const {temperature, windspeed} = data.current_weather;
            const {latitude} = data;
            const {rain_sum} = data.daily;
            console.log(latitude);
            const {longitude} = data;

            const myNewWeatherInfo = {
                temperature, 
                windspeed,
                latitude,
                longitude,
                rain_sum
            };
             
            setTempInfo(myNewWeatherInfo);
        } catch (error) {
            console.log(error);
        }
    };

    useEffect(() => {
        getWeatherInfo();
    }, [])
    
  return (
    <>
        <div className='wrap'>
            <div className='search'>
                <input type='search' 
                    placeholder='...search'
                    autoFocus
                    id='search'
                    className='searchTerm'
                    value={searchValue}
                    onChange={(e) => setSearchValue(e.target.value) }
                />
                <button className='searchButton' 
                    type='button'
                    onClick={getWeatherInfo}
                >
                    Search
                </button>
            </div>
        </div>

        <Weathercard tempInfo={tempInfo} />
    </>
  )
};

export default Temp