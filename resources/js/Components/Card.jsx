import React from "react";

const WeatherCard = (props) => {
    const store = localStorage.getItem("data");

    const { name, current } = JSON.parse(store);

    const time = (unixTime) =>
        new Date(unixTime * 1000).toLocaleTimeString("en-US");

    const celsius = (temp) => parseInt(temp - 273.15);

    return (
        <div>
            {current ? (
                <div className="bg-gray-50 w-full rounded text-gray-800">
                    <h2 className="text-md mb-2 px-4 pt-4">
                        <div className="flex justify-between">
                            <div className="badge relative top-0">
                                <p>City</p>
                                <span className="mt-2 py-2 text-2xl h-12px text-md font-bold w-12px right-1 bottom-1 px-2 capitalize">
                                    {name}
                                </span>
                            </div>
                            <div>
                                <p>Time</p>
                                <span className="text-lg font-bold">
                                    {time(current.dt)}
                                </span>
                            </div>
                        </div>
                    </h2>

                    <div className="text-md pt-4 pb-4 px-4">
                        <div className="flex justify-between items-center">
                            <div>
                                <h1 className="text-6xl">
                                    {celsius(current.temp)}°
                                </h1>
                            </div>
                            <div className="capitalize">
                                <p>{current.weather[0].main}</p>
                                <p className="font-bold">
                                    {current.weather[0].description}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            ) : null}
        </div>
    );
};

export default WeatherCard;
