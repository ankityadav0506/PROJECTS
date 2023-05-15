import React from 'react'

const Weathercard = ({tempInfo}) => {

    const {
        temperature, 
        windspeed,
        latitude,
        longitude,
        rain_sum
    } = tempInfo;
  return (
    <>
        {/* Temp Card */}
        <article className='widget'>
            <div className='weatherIcon'>
                <i className='wi wi-day-sunny'></i>
            </div>
            <div className='weatherInfo'>
                <div className='temperature'>
                    <span>{temperature}&deg;</span>
                </div>
                <div className='description'>
                    <div className='weatherCondition'>Sunny</div>
                    <div className='place'>Latitude - {latitude} <span>Longitude - </span> {longitude} <p style={{color:'yellow'}}>PS - This is your city's geo location</p></div>
                </div>
            </div>
            <div className='date'>{new Date().toLocaleString()}</div>

        {/* Our 4 column section */}
        <div className='extra-temp'>
            
            <div className='temp-info-minmax'>
                <div className='two-sided-section'>
                    <p>
                        <i className='wi wi-sunset'></i>
                    </p>
                    <p className='extra-info-leftside'>N/A <br />Sunset</p>
                </div>
                <div className='two-sided-section'>
                    <p>
                        <i className='wi wi-humidity'></i>
                    </p>
                    <p className='extra-info-leftside'>{rain_sum} <br />Humidity</p>
                </div>
            </div>

            <div className='weather-extra-info'>
                    <div className='two-sided-section'>
                        <p>
                            <i className='wi wi-rain'></i>
                        </p>
                        <p className='extra-info-leftside'>N/A <br />Pressure</p>
                    </div>
                    <div className='two-sided-section'>
                        <p>
                            <i className='wi wi-strong-wind'></i>
                        </p>
                        <p className='extra-info-leftside'>{windspeed} <br />Speed</p>
                    </div>
                </div>
        </div>
        </article>
    </>
  )
}

export default Weathercard