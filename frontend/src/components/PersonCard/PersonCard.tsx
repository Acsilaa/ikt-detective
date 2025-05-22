export default function PersonCard(){
    return (
    <a className="bg-white w-[200px] p-3 text-center rounded-[5px] flex-column shrink-0" href="">
        <p className="text-black font-semibold text-3xl grow-0 h-1/3">Tony</p>
        <p className="text-[16px] text-violet-600 grow-1 h-1/3">Electrician</p>
        <p className="text-black text-[16px] grow-0 h-1/3 align-bottom flex justify-center items-end">Answers: 10</p>
    </a>
    )
}