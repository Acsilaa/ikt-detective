import { useEffect, useState } from 'react';
import PersonCard from '../../components/PersonCard/PersonCard';
import st from './Home.module.css';
import f from '../../Utils';
import type { Person } from '../../Types';

export const Home = () => {
  const [people, setPeople] = useState<Person[] | null>(null);
  
  useEffect(() => {
    f(
      "subjects", 
      {}, 
      (error) => {
        console.log("Error:", error);
      }, 
      (response) => {
        console.log("Success:", response);
        // Assuming the response contains the people data
        // setPeople(response.data || []);
      }
    );
  }, []);

  return (
    <>
      <h1 className='text-center font-semibold text-4xl sm:text-5xl mb-5'>
        Detective assessment
      </h1>
      <p className='text-center m-0'>See below the subjects and detectives</p>
      <h2 className='text-2xl mt-12 text-left'>Subjects</h2>
      <div className='grid place-items-center w-[100%] md:flex md:flex-wrap gap-[10px] pt-3 pb-3'>
        <PersonCard></PersonCard>
        <PersonCard></PersonCard>
        <PersonCard></PersonCard>
        <PersonCard></PersonCard>
      </div>
    </>
  );
};