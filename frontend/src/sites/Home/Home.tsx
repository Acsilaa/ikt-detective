import PersonCard from '../../components/PersonCard/PersonCard';
import st from './Home.module.css';
export const Home = () => {
    return (
    <>
    <h1 className='text-center font-semibold text-4xl sm:text-5xl mb-5'>Detective assessment</h1>
    <p className='text-center m-0'>See below the subjects and detectives</p>
    <h2 className='text-2xl mt-12 text-left'>Subjects</h2>
    <div className='grid place-items-center w-[100%] md:flex md:flex-wrap gap-[10px] pt-3 pb-3'>
        <PersonCard></PersonCard>
        <PersonCard></PersonCard>
        <PersonCard></PersonCard>
        <PersonCard></PersonCard>
    </div>
    </>)
}