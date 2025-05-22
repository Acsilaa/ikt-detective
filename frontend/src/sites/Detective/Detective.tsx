import { useParams } from 'react-router-dom';
import f from '../../Utils';
import { Suspense, useEffect, useState } from 'react';
import type { fresp, Person } from '../../Types';
import QARow from '../../components/QARow/QARow'

export type QAPair = {
    question: string,
    answer: string,
    asker: string
}
export function Detective() {
    const { id } = useParams()
    const [pairs, setPairs] = useState<QAPair[]>([]);
    const [detective, setDetective] = useState<Person>({name:"", role:"detective", id:-1, attr: {job:'',actionCount:0}});
    useEffect(() => {
        f("detectiveQuestions", { "id": id }, () => { }, (resp: fresp) => {
            setPairs(resp.data);
        })
        f("detective", { id: id }, () => { }, (r: fresp) => {
            let data = r.data[0];
            console.log(data)
            setDetective({
                name: data["name"],
                role: "subject",
                id: data["id"],
                attr: {
                    job: data["job"],
                    actionCount: data["answers"],
                    experience: data["years_experience"],
                    birthdate: data["birthdate"]["date"].split(" ")[0],
                }
            });
        })
    }, [])
    return (
        <>
            <a href="/" className='underline'>Back to Home</a>
            <h1 className='text-left font-semibold text-4xl sm:text-5xl mb-9 mt-2'>{detective?.name} <span className='text-2xl text-violet-300 font-light'>detective</span></h1>
            <div className='flex flex-wrap mb-8 items-stretch bg-white rounded-[5px] p-3 gap-2'>
                {Object.keys(detective?.attr).map((k,i)=>{
                    if(k == "actionCount") return;
                    if(k == "job") return;
                    return (
                    <div className='p-4 rounded-2xl shadow-2xl shrink-0 min-w-[120px] bg-white text-black' key={i}>
                        <p className='text-2xl font-semibold mb-2'>{String(k).charAt(0).toUpperCase() + String(k).slice(1)}</p>
                        <p className='text-violet-600'>{String(Object.values(detective.attr)[i]) + (k == "experience" ? " years" : "")}</p>
                    </div>)
                })}
                
            </div>
            <h1 className='text-left font-semibold text-4xl sm:text-5xl mb-9 mt-2'>Questions Asked</h1>
            <div>
                {pairs.map((p, k) => <QARow question={p.question} answer={''} asker={''} key={k}></QARow>)}
            </div>
        </>)
}