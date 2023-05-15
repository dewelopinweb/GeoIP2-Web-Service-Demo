import Head from 'next/head'
import styles from '../styles/Home.module.css'

import { useState } from "react"

export default function Home() {
  const submitForm = async (event) => {
    event.preventDefault();

    setRowsData(rowsData => []);

    const ips = event.target.addresses.value.split(/\r?\n/);

    for(let ip of ips){
      ip = ip.trim();

      if(ip){
        let url = new URL(process.env.BACKEND_API_URL + "/geoip/city");
        url.search = new URLSearchParams({
          ip: ip
        }).toString();

        const res = await fetch(url, {
          headers: {
            'Content-Type': 'application/json',
          },
          method: 'GET',
        });

        const result = await res.json();

        if(!result.statusCode || result.statusCode !== 200){
          addResultErrorItem(ip, result.error)
        }else{
          addResultItem(ip, result.data)
        }
      }
    }
  };

  //Table
  const [rowsData, setRowsData] = useState([]);

  const addResultItem = (ip, data) => {
    const row = {
      type: 'success',
      ip: ip,
      countryCode: data.countryCode,
      postalCode: data.postalCode,
      cityName: data.cityName,
      timeZone: data.timeZone,
      accuracyRadius: data.accuracyRadius
    }
    setRowsData(rowsData => [...rowsData, row]);
  }

  const addResultErrorItem = (ip, data) => {
    const row = {
      type: 'error',
      ip: ip,
      description: data.description
    }
    setRowsData(rowsData => [...rowsData, row]);
  }

  return (
    <div className={styles.container}>
      <Head>
        <title>GeoIP2 Web Service Demo</title>
      </Head>

      <main className={styles.main}>
        <h1 className={styles.title}>
          GeoIP2 Web Service Demo
        </h1>

        <p className={styles.description}>
          IP Addresses
        </p>

        <form className={styles.form} onSubmit={submitForm}>
          <div className="form-group col-md-12">
            <textarea id="addresses" className="form-control" rows="5"></textarea>
          </div>
          
          <div className="form-group col-md-12">
            <button type="submit" className="btn btn-primary mt-2">
              Submit
            </button>
          </div>

        </form>

        <div className={styles.results}>
          <h2>
            GeoIP2 Web Service Demo Results
          </h2>
          <div className="row">
              <div className="col-sm-12">
                <table className="table">
                    <thead>
                      <tr>
                        <th>IP</th>
                        <th>Country Code</th>
                        <th>Postal Code</th>
                        <th>City Name</th>
                        <th>Time Zone</th>
                        <th>Accuracy Radius</th>
                      </tr>
                    </thead>
                  <tbody>
                    <TableRows rowsData={rowsData}/>
                  </tbody> 
                </table>
              </div>
          </div>
        </div>
      </main>

      <footer className={styles.footer}></footer>
    </div>
  )
}

function TableRows({rowsData}) {
  return(
    rowsData.map((data, index) => {
      if(data.type === 'error'){
        return(
          <tr key={index} className="bg-danger text-white">
            <td>{data.ip}</td>
            <td colspan="5">{data.description}</td>
          </tr>
        )
      }else{
        return(
          <tr key={index}>
            <td>{data.ip}</td>
            <td>{data.countryCode}</td>
            <td>{data.postalCode}</td>
            <td>{data.cityName}</td>
            <td>{data.timeZone}</td>
            <td>{data.accuracyRadius}</td>
          </tr>
        )
      }
    })
  )
}
