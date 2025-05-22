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
export function Subject() {
    const { id } = useParams()
    const [pairs, setPairs] = useState<QAPair[]>([]);
    const [subject, setSubject] = useState<Person>({name:"", role:"subject", id:-1, attr: {job:'',actionCount:0}});
    useEffect(() => {
        f("subjectpairs", { "id": id }, () => { }, (resp: fresp) => {
            setPairs(resp.data);
        })
        f("subject", { id: id }, () => { }, (r: fresp) => {
            let data = r.data[0];
            console.log(data)
            setSubject({
                name: data["name"],
                role: "subject",
                id: data["id"],
                attr: {
                    job: data["job"],
                    actionCount: data["answers"],
                    experience: data["experience"],
                    height: data["height"],
                    weight: data["weight"],
                    birtdate: data["birthdate"]["date"].split(" ")[0],
                    haircolor: data["haircolor"],
                    eyecolor: data["eyecolor"],
                }
            });
        })
    }, [])
    return (
        <>
            <a href="/" className='underline'>Back to Home</a>
            <h1 className='text-left font-semibold text-4xl sm:text-5xl mb-9 mt-2'>{subject?.name} <span className='text-2xl text-violet-300 font-light'>subject</span></h1>
            <div className='flex flex-wrap mb-8 items-stretch bg-white rounded-[5px] p-3 gap-2'>
                {Object.keys(subject?.attr).map((k,i)=>{
                    if(k == "actionCount") return;
                    return (
                    <div className='p-4 rounded-2xl shadow-2xl shrink-0 min-w-[120px] bg-white text-black' key={i}>
                        <p className='text-2xl font-semibold mb-2'>{String(k).charAt(0).toUpperCase() + String(k).slice(1)}</p>
                        <p className='text-violet-600'>{String(Object.values(subject.attr)[i])}</p>
                    </div>)
                })}
                
            </div>
            <h1 className='text-left font-semibold text-4xl sm:text-5xl mb-9 mt-2'>Questions && Answers</h1>
            <div>
                {pairs.map((p, k) => <QARow question={p.question} answer={p.answer} asker={p.asker} key={k}></QARow>)}
            </div>
        </>)
}